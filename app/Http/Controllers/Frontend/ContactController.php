<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Captcha;
use Carbon\Carbon;
class ContactController extends Controller
{
    /**
     * Display the contact form.
     */
    public function index()
    {
        return view('frontend.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
  
         $validator = Validator::make($request->all(), [
             'name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:contact_us,email',
            'contact' =>  'required|numeric|digits_between:5,15|unique:contact_us,contact',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            // 'g-recaptcha-response' => 'required|captcha',
            'captcha' => 'required|string',
                //  'g-recaptcha-response' => 'required',
        ]);


        // Verify reCAPTCHA
       
        if ($validator->fails()) {

            return redirect()->back()->withError($validator->errors()->all());
        }
       // Retrieve CAPTCHA code and creation time from the session
        $captchaCode = session('captcha_code');
        $captchaCreatedAt = session('captcha_created_at');

        // Define CAPTCHA expiry time (2 minutes)
        $expiryTime = Carbon::now()->subMinutes(2);

        // Check if CAPTCHA is expired
        if ($captchaCreatedAt < $expiryTime) {
             return redirect()->back()->withError(['captcha' => 'CAPTCHA has expired. Please try again.']);
        }

        // Check if CAPTCHA matches
        if ($request->input('captcha') !== $captchaCode) {
             return redirect()->back()->withError(['captcha' => 'CAPTCHA code is incorrect']);
        }
        try {
            ContactUs::create($request->all());
            return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            Log::error('Error storing contact: ' . $e->getMessage());
            return redirect()->route('contact')->with('error', 'There was an issue submitting your message. Please try again.');
        }
    }
}