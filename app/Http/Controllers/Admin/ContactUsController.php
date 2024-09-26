<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this line

class ContactUsController extends Controller
{
    /**
     * Display a listing of the contacts.
     */
    public function index(Request $request)
    {
        $auth = getAuth();       
        $search = trim($request->query('search', null));
        $perPage = $request->query('perPage', 10);
      
        $query = ContactUs::query();
    
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('contact', 'like', "%{$search}%")                    
                    ->orWhere('subject', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%");
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
        'contact_us.id', 
        'contact_us.name', 
        'contact_us.email', 
        'contact_us.contact', 
        'contact_us.subject', 
         'contact_us.message', 
       
    ];

    // Define the column to be used for ordering
    $orderColumn = $columns[$orderColumnIndex];
    $query->orderBy($orderColumn, $orderDirection);
    $data = $query->paginate($perPage); 
        return view('contacts.index', compact('data', 'auth'));
    }

    /**
     * Remove the specified contact from storage.
     */
    public function destroy($id)
    {
        $res =  ContactUs::findOrFail($id)->delete();
           if ($res) {
            return back()->withSuccess('Contact deleted successfully!');
        } else {
            return back()->withError('Contact not deleted!');
        }
      
    }
}
