<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\Hash;


class AuthenticationController extends Controller
{

    protected $PVEAuthCookie;
    protected $CSRFPreventionToken;

    public function __construct()
    {
    }

    public function index()
    {

        return view('pages.login');
    }
    public function registration()
    {
        // return view('auth.registration');
        return view('pages.register');
    }

    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|max:6',

        ]);


        if ($validator->fails()) {

            return redirect('login')->withError($validator->errors()->all());
        } else {

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                if (Auth::user()->status == 0) {
                    Auth::logout();
                    return Redirect('admin/login')->withError('Your account is deactivated, please contact your administrator!');
                }

                if (Auth::user()->id == 1) {
                    return Redirect('admin/accounts')->withSuccess('You have Successfully loggedin');
                } else {
                    return Redirect('admin/accounts')->withSuccess('You have Successfully loggedin');
                }

            } else {
                // toastr()->addError('Invalid credentials.');
                return Redirect('admin/login')->withError('Invalid credentials!');
            }
        }
    }

    public function postRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:6',
            'password_confirmation' => [
                'required',
                'same:password',
            ],
        ]);


        if ($validator->fails()) {

            return redirect('registration')->withError($validator->errors()->all());
            // ->withInput();
        } else {
            // die('lllll');
            $data = $request->all();
        
            $check = User::create($data);

            Auth::login($check);

            return redirect("admin/login")->withSuccess('Great! You have Successfully registered');
        }
    }

   

 

    public function logout()
    {
        // die('hhhh');
        // Session::flush();
        Auth::logout();
        // toastr()->addSuccess('You have Successfully logged out.');

        return Redirect('admin/login')->withSuccess('You have Successfully logged out.');
    }

    public function edit($id)
    {

        $user = Auth::user($id);

        if (!$user) {
            return redirect('admin/accounts')->with('error', 'User not found');
        }

        return view('profile.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            // 'password' => 'nullable',
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->dob = $request->dob;
        $user->mobile = $request->mobile;
        $user->email = $request->email;

        if ($request->hasFile('profile')) {
            $profile = $request->file('profile');
            $imageName = time() . '.' . $request->profile->extension();
            $request->profile->move(public_path('profile'), $imageName);
            $user->profile = $imageName;
        }

        $user->save();
        if ($user->status == 1) {
            return Redirect('admin/accounts')->with('success', 'Profile updated successfully');
        } 
       
    }

    public function update_password(Request $request)
    {

      
            $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|max:6',
            'password_confirmation' => [
                'required',
                'same:password',
            ],
        ]);


        if ($validator->fails()) {

            return redirect('forgot-password')->withError($validator->errors()->all());
            // ->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {

            return redirect()->back()->withError('Email does not match our records');
        } else {

            // if (!Hash::check($credentials['password'], $user->password)) {
            //     return redirect()->back()->withError(['password' => 'Invalid Old Password']);
            // }

            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('admin/login')->withSuccess('Password updated successfully');
        }
    }


    public function forgot_password()
    {
        return view('pages.forgot-password');
    }
}
