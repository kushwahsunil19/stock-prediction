<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\{User, Otp};
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function register(Request $request)
    {
        $validator = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'mobile' => 'required|unique:users',
            'dob' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users',
            'profile' => 'required|mimes:jpeg,jpg,png|max:2048',
            'password' => 'required|max:6',
            'confirm_password' => [
                'required',
                'same:password',
            ],

        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['role_type'] = 'user';
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            // Generate unique file name
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $extension;
            // Move file to the specified folder
            $file->move('uploads/profile/', $fileName);
            $input['profile'] = $fileName;
        }

        // print_r($input);die;
        $user = User::create($input);
        $token = Auth::guard('api')->login($user);
        $user = Auth::guard('api')->user();
        $profileName = $user->profile;
        $profilePath = asset('uploads/profile/' . $profileName);
    
        // Include profile name and path directly in the response data
        $responseData = array_merge($user->toArray(), ['profile' => $profilePath]);
        return response()->json([
            'status' => 'success',
            'data' => $responseData ,
            'token' => $token,
            'message' => 'User created successfully',
        ], 200);
    }
    public function updateProfile(Request $request)
{
    $validator = $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',          
        'dob' => 'required',
        'gender' => 'required',
    ]);

    $input = $request->all(); 
    $input['role_type'] = 'user';
    if ($request->hasFile('profile')) {
        $file = $request->file('profile');
        // Generate unique file name
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '_' . uniqid() . '.' . $extension;
        // Move file to the specified folder
        $file->move('uploads/profile/', $fileName);
        $input['profile'] = $fileName;
    }

    // Get the currently authenticated user
    $user = Auth::guard('api')->user();
    if (!$user) {
        // If user is not logged in, return an error response
        return response()->json([
            'status' => 'error',
            'message' => 'User not authenticated',
        ], 401);
    }

    // Update user profile
    $user->update($input);   
    
    // Construct the full profile image URL
    $profileName = $user->profile;
    $profilePath = asset('uploads/profile/' . $profileName);

    // Include profile name and path directly in the response data
    $responseData = array_merge($user->toArray(), ['profile' => $profilePath]);

    return response()->json([
        'status' => 'success',
        'data' => $responseData,
        'message' => 'User profile updated successfully',
    ], 200);
}
    /**
     * Laravel Passport User Login  API Function
     */
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $token = Auth::attempt($credentials);

        if (Auth::attempt($credentials)) {
            // Authentication successful, retrieve the authenticated user


            // Generate a token for the authenticated user

            $token = Auth::guard('api')->attempt($credentials);
            if (!$token) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized',
                ], 401);
            }
            $user = Auth::guard('api')->user();
            $profileName = $user->profile;
            $profilePath = ($user->profile!='')?asset('uploads/profile/' . $profileName):'';
        
            // Include profile name and path directly in the response data
            $responseData = array_merge($user->toArray(), ['profile' => $profilePath]);
            // Return the token along with a success message
            return response()->json([
                'status' => 'success',
                'data' => $responseData,
                'token' => $token,
                'message' => 'Login Successfully!'
            ], 200);
        }

        // Authentication failed, return an error message
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials',
        ], 401);
    }



    /**
     * Laravel Passport User Login  API Function
     */

    public function logout(Request $request)
    {
        Auth::guard('api')->logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }
    /**
     * Generate Otp API Function
     */

    public function genrateOtp(Request $request)
    {

        $validator = $request->validate([
            'mobile' => 'required',
        ]);
        $input = $request->all();
        $user = User::where('mobile', $input['mobile'])->first();
        if (empty($user)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials',
            ], 401);
        }
        // $otp = rand ( 1000 , 9999 );
        $otp = 1234;
        $matchThese = ['user_id' => $user->id];
        $data = Otp::updateOrCreate($matchThese, ['otp' => $otp, 'user_id' => $user->id]);
        return response()->json([
            'status' => 'success',
            'message' => 'Generate Otp Successfully',
        ]);
    }
    /**
     * Generate Otp API Function
     */

    public function verifyOtp(Request $request)
    {
        $validator = $request->validate([
            'otp' => 'required',
        ]);

        $input = $request->all();

        $otp = Otp::where('otp', $input['otp'])->first();

        if (empty($otp)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid Otp',
            ], 401);
        }

        $user = User::where('id', $otp->user_id)->first();

        // Generate token manually without password
        $token = Auth::guard('api')->login($user);

        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }
        $res = Otp::where('user_id', $otp->user_id)->delete();
        return response()->json([
            'status' => 'success',
            'data' => $user,
            'token' => $token,
            'message' => 'Login Successfully!'
        ], 200);
    }

    public function updatePassword(Request $request)
    {
      
         $validation = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
     
           $input = $request->all();
       
           $where = array('email'=>$input['email']);
           $user = User::where( $where)->first();
            if(!empty($user)) 
            {
                User::where($where)->update(['password'=>Hash::make($input['password'])]);
               
                return response()->json([
                    'status' => 'success',                   
                    'message' => 'Update Password Successfully!'
                ], 200);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'User not found',
                ], 404);
            }
    }
    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::guard('api')->user(),
            'token' => Auth::guard('api')->refresh(),
        ]);
    }
}
