<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminuIController extends Controller
{
    public function loaders()
    {
        return view('pages.loaders');
    }

}
