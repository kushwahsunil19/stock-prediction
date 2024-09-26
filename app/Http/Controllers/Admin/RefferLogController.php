<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RefferLog;
use Illuminate\Support\Facades\Auth; // Add this line
class RefferLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $auth = getAuth();       
    $search = trim($request->query('search', null));
    $perPage = $request->query('perPage', 10);
  
    // $query = RefferLog::query();
    $query = RefferLog::with(['user']);
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('reffer_email', 'like', "%{$search}%")                    
                ->orWhere('subject', 'like', "%{$search}%")
                 ->orWhere('created_at', 'like', "%{$search}%");
        });

        // Adding the user email match condition
        $query->orWhereHas('user', function ($q) use ($search) {
            $q->where('email', 'like', "%{$search}%");
             $q->where('created_at', 'like', "%{$search}%");
              $q->where('updated_at', 'like', "%{$search}%");
            
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
        'reffer_logs.id', 
        'reffer_logs.name', 
        'reffer_logs.email', 
        'reffer_logs.reffer_email', 
        'reffer_logs.subject',
        'reffer_logs.created_at',
        'reffer_logs.created_at',
        'reffer_logs.updated_at',
    ];

    // Define the column to be used for ordering
    $orderColumn = $columns[$orderColumnIndex];
  
    $query->orderBy($orderColumn, $orderDirection);

    $data = $query->paginate($perPage); 
   // echo "<pre>";print_r($data);die;
    return view('refferlog.index', compact('data', 'auth'));
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
      $res =  RefferLog::findOrFail($id)->delete();
          if ($res) {
            return back()->withSuccess('Reffer log deleted successfully!');
        } else {
            return back()->withError('Reffer log not deleted!');
        }
      
    }
}
