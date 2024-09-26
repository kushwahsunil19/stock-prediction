<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartsController extends Controller
{
    public function chart_chartist()
    {
        return view('pages.chart-chartist');
    }

    public function chart_echart()
    {
        return view('pages.chart-echart');
    }

    public function chart_apex()
    {
        return view('pages.chart-apex');
    }

}
