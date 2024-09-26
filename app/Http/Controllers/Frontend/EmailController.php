<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserEmail;
use App\Models\ContactUs;
use App\Models\RefferLog;
use Illuminate\Support\Facades\Auth;
class EmailController extends Controller
{
   
    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $user = Auth::user();
        $firstName = $user->first_name;
        $lastName = $user->last_name;
        $sender_name =   $firstName. " ". $lastName ;
        // For example purposes, assume the user name is fetched from somewhere.
        $user_name = $request->input('user_name'); // Replace this with actual user data if needed.

        // Send email
        Mail::to($email)->send(new UserEmail($sender_name));
        RefferLog::create(['email'=> $user->email, 'reffer_email'=> $email,'name'=> $sender_name,'subject'=>'Account Reffer' ]);
        return back()->with('success', 'Email sent successfully!');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
