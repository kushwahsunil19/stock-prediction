<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class CookieConsentController extends Controller
{
    public function store(Request $request)
    {
        Session::put('cookieConsent', true);
        return response()->json(['status' => 'success']);
    }
}
