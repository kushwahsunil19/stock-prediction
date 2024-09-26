<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User, Participant, Quiz, Competition, ParticipantCompetition, ParticipantAnswer, UserRegisterDate};
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

use App\Mail\AccountActiveEmail;
use App\Mail\ResetPasswordLink;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    protected $latestId;
    public function __construct()
    {
        $this->latestId  = Competition::latest()->value('id');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        return view('frontend.login');
    }


    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',

        ]);


        if ($validator->fails()) {

            return redirect('sign-in')->withError($validator->errors()->all());
        } else {

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                if (Auth::user()->status == 0) {
                    Auth::logout();
                    return Redirect('sign-in')->withError('Your account is deactivated, please contact your administrator!');
                }               

                return Redirect('/competitions')->withSuccess('You have Successfully loggedin');
            } else {
                // toastr()->addError('Invalid credentials.');
                return Redirect('sign-in')->withError('Invalid credentials!');
            }
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function signup()
    {
        $data = [];
          $current_date = Carbon::now()->format('Y-m-d');
         $com = Competition::where('enddate', '>=', $current_date)
        ->where('startdate', '<=', $current_date)
        ->orderBy('startdate')
        ->first();
          if (!isset($com->id)) {
                return redirect()->back()->withError('There is no competition.');
          }

     
        return view('frontend.registration');
    }
    public function postRegistration(Request $request)
    {
        // Define custom validation messages
        $messages = [
            'dob.required' => 'The date of birth field is required.',
            'dob.date' => 'The date of birth must be a valid date.',
            'dob.before' => 'The date of birth must be a date before today.',
        ];

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
             'mobile' => 'required|numeric|digits_between:5,15|unique:users,mobile',
            'dob' => [
                'required',
                function ($attribute, $value, $error) {
                    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {
                        $error('Please select a valid date of birth.');
                    }
                    try {
                        Carbon::parse($value);
                    } catch (\Exception $e) {
                        $error('Please select a valid date of birth.');
                    }
                },
                'before:today',
            ],
            'gender' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirmation' => [
                'required',
                'same:password',
            ],
        ], $messages);

        if ($validator->fails()) {

            return redirect('sign-up')->withError($validator->errors()->all());
            // ->withInput();
        }
            // die('lllll');
            $data = $request->all();
  	        $data['dob'] = Carbon::parse($data['dob'])->format('Y-m-d');

            $data['password'] = Hash::make($data['password']);
            $data['status'] = 1; 
            $user_name = $data['first_name'] . ' ' . $data['last_name'];
    
            $user = User::create($data);
            $user_id = $user->id;
    
            // Generate activation token
            $activation_token = Str::random(60);
            $user->activation_token = $activation_token;
            $user->save();
    
            // Send email with the activation link
             Mail::to($data['email'])->send(new AccountActiveEmail($user_name, $activation_token));
             //$com = Competition::where(['id' => $this->latestId])->latest()->first();
             $current_date = Carbon::now()->format('Y-m-d');

            $com = Competition::where('enddate', '>=', $current_date)
                            ->where('startdate', '<=', $current_date)
                            ->orderBy('startdate')
                            ->first();
        
                            
            $participant_id = Participant::create(['competition_id' =>   $com->id, 'user_id' => $user_id])->id;
            // Assuming you are creating a Competition instance and getting the latest one
           

            // Retrieve the start and end dates
            $startDate = Carbon::parse($com->startdate)->startOfDay();
            $endDate = Carbon::parse($com->enddate)->startOfDay();

            // Calculate the number of days between the start and end dates
            $dayCount = $startDate->diffInDays($endDate) +1 ; // +1 to include both start and end dates

            // Assign the number of days to the info array
            $info['days'] = $dayCount; // Number of days to loop through
            $date = Carbon::now();  // Initialize the starting date and time to the current date and time

            for ($i = 0; $i < $info['days']; $i++) {
                UserRegisterDate::create([
                    'participant_id' => $participant_id,
                    'user_id' => $user_id,
                    'reg_date' => $date->format('Y-m-d H:i:s'),  // Format date and time
                ]);
                $date->addDay();  // Increment the date by one day
            }
    
            return redirect("/sign-in")->withSuccess('Great! You have Successfully registered. Please check your email to activate your account.');
      
    }
    public function postRegister(Request $request)
    {
        $data = [];
        $input = $request->all();
        $day = count($input['day']);
        $token_use = $input['token_used'];
        $competition_id =  $input['competition_id'];
        
        if ($token_use == 'Select') {
           
            return redirect("/register/". $competition_id)->withError('Please select a token.');
        }

        $user_id = Auth::user()->id;
        $participant = Participant::where('user_id', $user_id)->where('competition_id', $competition_id)->first();
        // if( $participant->status){
        //      $competition_id =  $participant->competition_id;
        // }else{
        //      $competition_id =  $this->latestId;
        // }
    
        $existsData = Quiz::where('competition_id',  $competition_id )->exists();
        if (!$existsData) {
           
            return redirect("/register/". $competition_id)->withError('There are no questions in the competition.');
        }
     
        // $data = Competition::with('quiz', 'participant')->where('id', $this->latestId)->get();
        $com = Competition::with('quiz', 'participant')->where(['id' => $competition_id])->latest()->first();

        // Retrieve the start and end dates
        $startDate = Carbon::parse($com->startdate)->startOfDay();
        $endDate = Carbon::parse($com->enddate)->startOfDay();
        // Calculate the number of days between the start and end dates
        $dayCount = $startDate->diffInDays($endDate) ; // +1 to include both start and end dates
        if (isset($participant)) {
            $token_used =  $participant->used_token + $token_use;
        }
         $dayNewCount = $dayCount - $com->sprint; 
        $remain_token =  $com->token_no - $token_used;

        if ($com->token_no >=  $token_used) {
            $date = date('Y-m-d H:i:s');

            $token_expiry_date = date("Y-m-d 23:59:59", strtotime($date . " +" . $dayNewCount . " day"));
            foreach ($input['day'] as $key => $val) {
              
                ParticipantCompetition::create([
                    'competition_id' => $competition_id,
                    'participant_id' => $participant->id,
                    'user_id' => $user_id,
                    'answer' => 0.00,
                    'day' => $val,
                    'participant_date' => $date,
                    'token_used' => $token_use,
                    
                ]);
            }
            $ParticipantCompetition = ParticipantCompetition::where('user_id', $user_id)->where('competition_id', $competition_id)->get();

            Participant::where(["user_id"=>$user_id,'competition_id'=>$competition_id])->update(["used_token" =>  $token_used, "token_expiry_date" => $token_expiry_date, 'status' => 1]);
            User::where("id", $user_id)->update([ 'is_validate' => 1]);
        } else {
            return Redirect('register')->withError('Insufficient tokens for this competition.');
        }



        // return view('frontend.competition-single', compact('data', 'question', 'participantAnswers', 'remain_token', 'token_use', 'participant'));

        return redirect("/competition/" . $competition_id)->withSuccess('Great! You have Successfully validated');
    }

    /**
     * Display the specified resource.
     */
    public function showLinkRequestForm()
    {
        return view('frontend.forgot_password');
    }


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if ($user) {
            Mail::to($email)->send(new ResetPasswordLink($user->name, $email));
            return redirect("/sign-in")->withSuccess('Password reset link sent successfully. Please check your email.');
        } else {
            return redirect()->back()->withError('The provided email does not exist in our records.');
        }
    }
    /**
     * Display the specified resource.
     */


    public function showResetForm(Request $request, $token = null)
    {
        return view('frontend.reset_password')->with(
            ['email' => $request->email]
        );
    }

    public function resetPassword(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->all());
        }
    
        // Retrieve and trim the email from the request
        $email = trim($request->input('email'));
        $newPassword = $request->input('password');
    
        // Debug the request data if necessary
        // print_r($request->all()); die;
    
        // Find the user by email
        $user = User::where('email', $email)->first();
    
        if (!$user) {
            return redirect()->back()->withErrors('Email does not match our records');
        } else {
            // Update the user's password
            $user->password = Hash::make($newPassword);
            $user->save();
            return redirect('sign-in')->withSuccess('Password updated successfully');
        }
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function activateAccount($token)
    {
        $user = User::where('activation_token', $token)->first();

        if (!$user) {
            return redirect('/sign-in')->withError('Invalid activation token.');
        }

        // Activate the user
        $user->status = 1;
        $user->activation_token = null;
        $user->save();

        // Auto-login the user
        Auth::login($user);

        return redirect('/register')->withSuccess('Your account has been activated successfully. You are now logged in.');
    }
    public function userLogout()
    {
        // die('hhhh');
        // Session::flush();
        Auth::logout();
        // toastr()->addSuccess('You have Successfully logged out.');

        return Redirect('sign-in')->withSuccess('You have Successfully logged out.');
    }
}
