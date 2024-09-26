<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User, Participant, Quiz, Competition, ParticipantCompetition, ParticipantAnswer, UserRegisterDate};
use Carbon\Carbon;
class ParticipantRuleController extends Controller
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
          }else{
               return redirect()->back()->withError('There is no competition.');
          }
         
      
          
        $existsData =  Competition::where('id', $competition_id )->exists();    
        if(!$existsData){
            return redirect()->back()->withError('There is no competition.');
        }
        $data = Competition::with('quiz', 'participant')->where('id', $competition_id )->get();
        return view('frontend.rules',compact('data'));
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
