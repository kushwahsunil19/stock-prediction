<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Competition,EndCompetionMsg, Quiz, Participant, ParticipantAnswer, ParticipantCompetition, User,UserRegisterDate};
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
class HomeController extends Controller
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
        $data = Competition::with('quiz', 'participant')->get();
        return view('frontend.home', compact('data'));
    }
    /**
     * Display a listing of the resource.
     */
    public function register($competition_id = '')
    {
       
        $user_id = Auth::user()->id;
        // $mail  = Auth::user()->email;
        // if ($email != '' &&  $email == $mail) {
        //     User::where("id", $user_id)->update(['status' => 1]);
        // }
        // $participant = Participant::where('user_id', $user_id)->first();
        // if ($participant->status) {
        //     $competition_id =  $participant->competition_id;
        // } else {
        //     $competition_id =  $this->latestId;
        // }
        $existsCom =  Competition::where('id', $competition_id)->exists();
        if (!$existsCom) {
            return redirect()->back()->withError('There is no competition.');
        }
        $com =  Competition::where('id', $competition_id)->first();
        
        $existsData =  Participant::where('competition_id', $competition_id)->where('user_id', $user_id)->exists();
        
        if (!$existsData) {
           
            $participant_id = Participant::create(['competition_id' =>   $competition_id, 'user_id' => $user_id])->id;
            // Assuming you are creating a Competition instance and getting the latest one
           
    
            // Retrieve the start and end dates
            $startDate = Carbon::parse($com->startdate)->startOfDay();
            $endDate = Carbon::parse($com->enddate)->startOfDay();
    
            // Calculate the number of days between the start and end dates
            $dayCount = $startDate->diffInDays($endDate) + 1; // +1 to include both start and end dates
    
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
        }
            $res = Participant::where('competition_id', $com->id)->where('user_id', $user_id)->first();
        
        if ($res) {
            $p_id = $res->id;
            $participant = Participant::with(['userRegisterDate' => function ($query) use ($p_id,$user_id) {
                $query->where('participant_id', $p_id)->where('user_id', $user_id)->orderBy('created_at', 'asc');
            }])->where('user_id', $user_id)->where('competition_id',$com->id)->first();
        
            // Log the executed queries
          
        }
     
        $data = Competition::with('quiz', 'participant')->where('id', $competition_id)->get();
      
        // $startDate = Carbon::createFromFormat('Y-m-d',$data[0]->startdate);
        // $endDate = Carbon::createFromFormat('Y-m-d', $data[0]->enddate);

        //  $dates = [];
        //  foreach(  $participant->userRegisterDate as $res ){
        //     $dates[] = $res->reg_date; 
        //  }
        // print_r( $dates);die;
        // while ($startDate->lte($endDate)) {
        //     $dates[] = $startDate->copy(); // Add a copy of the date to the array
        //     $startDate->addDay(); // Move to the next day
        // }
        return view('frontend.register', compact('data', 'participant','competition_id'));
    }
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        $data = [];
        $data = Competition::with('quiz', 'participant')->where('id', $this->latestId)->get();
        return view('frontend.login', compact('data'));
    }
    /**
     * Display a listing of the resource.
     */
    public function howItWork($id = '')
    {
        $data = [];
        $competitionEndData = [];
          $current_date = Carbon::now()->format('Y-m-d');
         $com = Competition::where('enddate', '>=', $current_date)
        ->where('startdate', '<=', $current_date)
        ->orderBy('startdate')
        ->first();
          if (isset($com->id)) {
                if(Auth::check()){
                    $user_id = Auth::user()->id;
                    $participant = Participant::where('user_id', $user_id)->where('competition_id', $com->id)->first();
                
                    if( isset($participant->status)){
                        $competition_id =  $participant->competition_id;
                    }else{
                        $competition_id =  $com->id;
                    }
                }else{
                $competition_id = $com->id;  
                }
                     $data = Competition::with('quiz', 'participant')->where('id', $competition_id)->first();
          }else{
                    $competitionEndData = EndCompetionMsg::latest()->first();
            }
         
      
          
     
   

        return view('frontend.how-it-work', compact('data','competitionEndData'));
    }
    /**
     * Display a listing of the resource.
     */
    public function getCompetitions()
    {
        $user_id = Auth::user()->id;
        $question = Quiz::get();
        $current_date = now(); // Use Carbon instance for current date and time
      
        // Fetch all competitions with their associated quiz and participants
        $competitions = Competition::select('*', 
                                        DB::raw('(CASE WHEN enddate < NOW() THEN "Expired" ELSE "Active" END) AS competition_status'),
                                        DB::raw('(SELECT COUNT(*) FROM participants WHERE competition_id = competitions.id AND participants.status = 1 AND user_id = ' . $user_id . ') AS is_participant'),
                                        DB::raw('(SELECT competition_id FROM participants WHERE competition_id = competitions.id AND participants.status = 1 AND user_id = ' . $user_id . '  LIMIT 1) AS competition_id'),
                                        DB::raw('(SELECT token_expiry_date FROM participants WHERE competition_id = competitions.id AND participants.status = 1 AND user_id = ' . $user_id . ' LIMIT 1) AS token_expiry_date'),
                                        DB::raw('(SELECT created_at FROM participants WHERE competition_id = competitions.id AND  user_id = ' . $user_id . ' LIMIT 1) AS join_date')
                                        )
                                    ->with('quiz', 'participant')
                                    ->get();

    // echo "<pre>";
    // print_r($competitions);die;
    
        return view('frontend.competition-list', compact('competitions', 'question'));
    }
    /**
     * Display a listing of the resource.
     */
    public function getSingleCompetition($competition_id = '')
    {
     
       
        $data = [];
        $user_id = Auth::user()->id;
        if (!isset($user_id)) {
            return redirect()->route('sign-in')->withError('You must be logged in to participate in the competition.');
        }
 

        $existsCompetition =  Participant::where('user_id', $user_id)->where('competition_id', $competition_id)->exists();
        if (!$existsCompetition) {
            return redirect()->back()->withError('Join the compétition');
        }

        $participant = Participant::where('user_id', $user_id)->where('competition_id', $competition_id)->first();
           // competition join or not.
        $existParticipantCompetition = ParticipantCompetition::with('participantAnswers')        
        ->where('competition_id', $competition_id)
        ->where('participant_id', $participant->id)
        ->where('user_id', $user_id)
        ->exists();
        if (!$existParticipantCompetition) {
            return redirect()->back()->withError('Join the compétition');
        }
        // if ($participant->status) {
        //     $competition_id =  $participant->competition_id;
        // } else {
        //     $competition_id =  $this->latestId;
        // }
        if(isset($user_id)){
            $date = date('Y-m-d H:i:s'); 
              $visiblity_date = date("Y-m-d 23:59:59", strtotime($participant->token_expiry_date . " +7 day"));
         if ( strtotime($date) > strtotime($visiblity_date) ) {
                return redirect()->route('register')->withError('You have no competition available.');
            }          
           
        }
        
        $existsData =  Competition::where('id', $competition_id)->exists();

        if (!$existsData) {
            return redirect()->back()->withError('There is no competition.');
        }
        $question = Quiz::with('participantAanswer', 'questionType')->get();
        
        $data = Competition::with('quiz', 'participant')->where('id', $competition_id)->get();
        $participant = Participant::where('user_id', $user_id)->where('competition_id', $competition_id)->first();
        $participantCompetition = ParticipantCompetition::with('participantAnswers')
            ->where('user_id', $user_id)
                ->where('participant_id',  $participant->id)
            ->where('competition_id', $competition_id)
            ->get();

        return view('frontend.competition-single', compact('data', 'question', 'participant', 'participantCompetition','competition_id'));
    }
    public function postAnswer(Request $request)
    {
        $user_id = Auth::user()->id;
        $data = [];
        $input = $request->all();     
        $competition_id =  $input['competition_id']; 

        foreach ($input['que_id'] as $key => $val) {
            $answer = $input['answer'][$key];
            ParticipantAnswer::create(['com_participant_id' => $input['id'], 'question_id' => $val, 'p_answer' => $answer ]);
        }

        $date = date('Y-m-d H:i:s');
        $participant = Participant::where('user_id', $user_id)->where('competition_id',$competition_id)->first();
        if ($participant->status) {
            $competition_id =  $participant->competition_id;
        } else {
            $competition_id =  $this->latestId;
        }
        ParticipantCompetition::where("id", $input['id'])->update(["answer_date" => $date]);

        return redirect("/competition/" . $competition_id)->withSuccess('Great! You have Successfully answerd');
    }

public function autoSubmitAnswer()
{

    $participants = Participant::where('status', 1)->get();
    $currentDate = Carbon::now();
    $date = date('Y-m-d'); 

    foreach ($participants as $participant) {
        $competitionId = $participant->competition_id;
        $participantId = $participant->id;

        // Get the participant competition records with null answer_date
        $participantCompetitions = ParticipantCompetition::where('participant_id', $participantId)
            ->where('competition_id', $competitionId)
            ->whereNull('answer_date')
            ->where('day', $date)
            ->get();
      
        foreach ($participantCompetitions as $participantCompetition) {
            $questions = Quiz::where('competition_id', $competitionId)->get();

            foreach ($questions as $question) {
                $questionId = $question->id;

                // Check if an answer already exists for this question
                $existingAnswer = ParticipantAnswer::where('com_participant_id', $participantCompetition->id)
                    ->where('question_id', $questionId)
                    ->exists();

                if (!$existingAnswer) {
                    // Create a new answer if it doesn't exist
                    $answer = null; // Your logic to generate an answer

                    ParticipantAnswer::create([
                        'com_participant_id' => $participantCompetition->id,
                        'question_id' => $questionId,
                        'p_answer' => $answer,
                      
                    ]);
                  
                }
            }
                     // Update the answer_date after processing all questions
                    $participantCompetition->update(['answer_date' => $currentDate]);
           
        }
    }

    echo "true";
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
}
