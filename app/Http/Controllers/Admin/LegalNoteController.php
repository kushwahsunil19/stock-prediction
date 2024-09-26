<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LegalNote;
class LegalNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $auth =  getAuth(); 
        $perPage = 10;
        // Check if the request contains a custom pagination limit
        if ($request->has('perPage')) {
            $perPage = $request->input('perPage');
        }
        // Fetching records with pagination based on the provided limit
        $data = LegalNote::paginate($perPage); 
      
        return view('legalnote.legal_note', compact('data', 'auth')); 
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
        $input = $request->all();  
       
         $res = LegalNote::create( $input);        
         if ($res) {
            return back()->withSuccess('Legal note added successfully!');
        } else {
            return back()->withError('Legal note not added!');
        }
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
    {   $input = $request->all();    
        unset($input['_token']);
        unset($input['_method']);
        $res =  LegalNote::whereId($id)->update($input);          
        if ($res) {
           return back()->withSuccess('Legal note updated successfully!');
       } else {
           return back()->withError('Legal note not updated!');
       }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $res = LegalNote::where('id',$id)->delete();    
        if ($res) {
            return back()->withSuccess('Legal note deleted successfully!');
        } else {
            return back()->withError('Legal note not deleted!');
        }
    }
}
