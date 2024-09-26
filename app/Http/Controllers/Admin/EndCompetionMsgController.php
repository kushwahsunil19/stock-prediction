<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{EndCompetionMsg,Competition};
class EndCompetionMsgController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
     
        $auth = getAuth(); 
      
        $search = trim($request->query('search', null));
        $perPage = $request->query('perPage', 10);
      
        $query = EndCompetionMsg::query();
    
       
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
         'end_competition.created_at', 
         'end_competition.news_heading', 
        'end_competition.summary', 
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
        return view('competition.create_end_competition',compact( 'auth')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();  
       
         $res = EndCompetionMsg::create( $input);        
         if ($res) {
            return Redirect('admin/end-competition')->withSuccess('Message added successfully!');
         
        } else {
            return Redirect('admin/end-competition')->withError('Message not added!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $auth = getAuth(); 
        $com = EndCompetionMsg::where('id',$id)->first();  
        
        return view('competition.edit_end_competition',compact( 'auth','com')); 
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
        $res =  EndCompetionMsg::whereId($id)->update($input);          
        if ($res) {
            return Redirect('admin/end-competition')->withSuccess('Message updated successfully!');
       } else {
           return Redirect('admin/end-competition')->withError('Message not updated!');
       }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
