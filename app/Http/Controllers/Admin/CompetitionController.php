<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Competition};
class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $auth = getAuth(); 
      
        $search = trim($request->query('search', null));
        $perPage = $request->query('perPage', 10);
      
        $query = Competition::query();
    
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('startdate', 'like', "%{$search}%")
                    ->orWhere('enddate', 'like', "%{$search}%")
                      ->orWhere('token_no', 'like', "%{$search}%")
                      ->orWhere('sprint', 'like', "%{$search}%");
            });
        }
               // Handle ordering
    if ($request->has('orderColumnIndex') && $request->has('orderDirection')) {
        $orderColumnIndex = $request->input('orderColumnIndex');
        $orderDirection = $request->input('orderDirection');
    } else {
        // Default order column and direction
        $orderColumnIndex = 0;  // Default to first column (id)
        $orderDirection = 'DESC';
    }

    $columns = [
         'competitions.created_at', 
         'competitions.name', 
        'competitions.startdate', 
        'competitions.enddate', 
         'competitions.sprint', 
        'competitions.token_no', 
         'competitions.rule_of_competition', 
       
        	
    ];

    // Define the column to be used for ordering
    $orderColumn = $columns[$orderColumnIndex];
   ///print_r($orderColumn);die;
  
    $query->orderBy($orderColumn, $orderDirection);
        $data = $query->paginate($perPage);  
        return view('competition.index', compact('data', 'auth')); 
    }
  /**
     * Show the form for  resource.
     */
    public function endCompetition(Request $request)
    {     $auth = getAuth(); 
      
        $search = trim($request->query('search', null));
        $perPage = $request->query('perPage', 10);
      
        $query = Competition::query();
    
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('startdate', 'like', "%{$search}%")
                    ->orWhere('enddate', 'like', "%{$search}%")
                      ->orWhere('token_no', 'like', "%{$search}%")
                      ->orWhere('sprint', 'like', "%{$search}%");
            });
        }
               // Handle ordering
    if ($request->has('orderColumnIndex') && $request->has('orderDirection')) {
        $orderColumnIndex = $request->input('orderColumnIndex');
        $orderDirection = $request->input('orderDirection');
    } else {
        // Default order column and direction
        $orderColumnIndex = 0;  // Default to first column (id)
        $orderDirection = 'DESC';
    }

    $columns = [
         'competitions.created_at', 
         'competitions.name', 
        'competitions.startdate', 
        'competitions.enddate', 
         'competitions.sprint', 
        'competitions.token_no', 
         'competitions.rule_of_competition', 
       
        	
    ];

    // Define the column to be used for ordering
    $orderColumn = $columns[$orderColumnIndex];
   ///print_r($orderColumn);die;
  
    $query->orderBy($orderColumn, $orderDirection);
        $data = $query->paginate($perPage);  
        return view('competition.end_competition', compact('data', 'auth')); 
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  $auth = getAuth(); 
        return view('competition.create',compact( 'auth')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();  
       
         $res = Competition::create( $input);        
         if ($res) {
            return Redirect('admin/competitions')->withSuccess('Competition added successfully!');
         
        } else {
            return Redirect('admin/competitions')->withError('Competition not added!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $auth = getAuth(); 
        $com = Competition::with('participant')->where('id',$id)->first();  
        
        return view('competition.edit',compact( 'auth','com')); 
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
    {   $input = $request->all();    
        unset($input['_token']);
        unset($input['_method']);
        $res =  Competition::whereId($id)->update($input);          
        if ($res) {
            return Redirect('admin/competitions')->withSuccess('Competition updated successfully!');
       } else {
           return Redirect('admin/competitions')->withError('Competition not updated!');
       }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $res = Competition::where('id',$id)->delete();    
        if ($res) {
            return back()->withSuccess('Competition deleted successfully!');
        } else {
            return back()->withError('Competition not deleted!');
        }
    }
}
