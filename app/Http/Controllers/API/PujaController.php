<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Puja,User,Donation,PujaPackage};
use Illuminate\Support\Facades\Auth;

class PujaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index()
    {       
        $user = Auth::guard('api')->user();      
        if (!$user) {
            // If user is not logged in, return an error response
            return response()->json([
                'status' => 'error',
                'message' => 'User not authenticated',
            ], 401);
        }
        $pujaList = Puja::with([
            'pujaPackage',
            'donation',
            'gallery'
        ])->get();
        $message = 'Puja Listing Successfully';

        if ($pujaList->isEmpty()) {
            $message = 'No Poojas found';
            return response()->json([
                'status' => 'error',
                'message' =>  $message,
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $pujaList->toArray(), // Convert to array if needed
            'message' => $message,
        ]);
    }
     /**
     * Display a listing of the resource.
     */
   
     public function getPackage()
     {       
         $user = Auth::guard('api')->user();      
         if (!$user) {
             // If user is not logged in, return an error response
             return response()->json([
                 'status' => 'error',
                 'message' => 'User not authenticated',
             ], 401);
         }
         $packageList = PujaPackage::get();
         $message = 'Package Listing Successfully';
 
         if ($packageList->isEmpty()) {
             $message = 'No Packages found';
             return response()->json([
                 'status' => 'error',
                 'message' =>  $message,
             ], 404);
         }
         return response()->json([
             'status' => 'success',
             'data' => $packageList->toArray(), // Convert to array if needed
             'message' => $message,
         ]);
     }
      /**
     * Display a listing of the resource.
     */
   
    public function getDonation()
    {       
        $user = Auth::guard('api')->user();      
        if (!$user) {
            // If user is not logged in, return an error response
            return response()->json([
                'status' => 'error',
                'message' => 'User not authenticated',
            ], 401);
        }
        $donationList = Donation::get();
        $message = 'Donation Listing Successfully';

        if ($donationList->isEmpty()) {
            $message = 'No Donations found';
            return response()->json([
                'status' => 'error',
                'message' =>  $message,
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $donationList->toArray(), // Convert to array if needed
            'message' => $message,
        ]);
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
