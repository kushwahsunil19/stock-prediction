<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LegalNote;
class LegalController extends Controller
{
    public function terms()
    {
         $data = [];
        return view('frontend.terms',compact('data'));
    }

    public function privacy()
    {
        return view('frontend.privacy');
    }

    public function cookie()
    {
        return view('frontend.cookie');
    }
    
    public function legalNote()
    {
        $data = LegalNote::latest()->first();        
        return view('frontend.legal',compact('data'));
    }

}
