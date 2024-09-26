<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
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
        $data = AboutUs::paginate($perPage); 
      
        return view('aboutus.about-us', compact('data', 'auth')); 
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
       
         $res = AboutUs::create( $input);        
         if ($res) {
            return back()->withSuccess('About us added successfully!');
        } else {
            return back()->withError('About us not added!');
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
        $res =  AboutUs::whereId($id)->update($input);          
        if ($res) {
           return back()->withSuccess('About us updated successfully!');
       } else {
           return back()->withError('About us not updated!');
       }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $res = AboutUs::where('id',$id)->delete();    
        if ($res) {
            return back()->withSuccess('About us deleted successfully!');
        } else {
            return back()->withError('About us not deleted!');
        }
    }
}