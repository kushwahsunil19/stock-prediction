<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Participant,ParticipantCompetition,Quiz};
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   public function index(Request $request)
{
    $auth = getAuth();  
  

    $search = trim($request->query('search', null));
    $perPage = $request->query('perPage', 10);
  
    $query = User::query();
    $query->where('email', '!=', $auth->email);
    
 if ($request->has('dateRange')) {
        $dates = explode(' to ', $request->get('dateRange'));
        if (count($dates) == 2) {
            try {
                $startDate = Carbon::parse($dates[0])->startOfDay();
                $endDate = Carbon::parse($dates[1])->endOfDay();
                $query->whereBetween('created_at', [$startDate, $endDate]);
            } catch (\Exception $e) {
                // Handle date parsing error
                return back()->withErrors(['dateRange' => 'Invalid date range provided.']);
            }
        }
    }
    $is_validate = true;
    if( $search =='Completed') {
          $is_validate = false;
          $query->where('is_validate',1);
    }
    if($search =='Pending') {
         $is_validate = false;
          $query->where('is_validate',0);
    }
    if( $is_validate){
         if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('mobile', 'like', "%{$search}%")
                    ->orWhere('dob', 'like', "%{$search}%")
                    ->orWhere('gender', 'like', "%{$search}%")
                    ->orWhere('created_at', 'like', "%{$search}%");
            });
        }
    }
   
       // Handle ordering
    if ($request->has('orderColumnIndex') && $request->has('orderDirection')) {
        $orderColumnIndex = $request->input('orderColumnIndex');
        $orderDirection = $request->input('orderDirection');
    } else {
        // Default order column and direction
        $orderColumnIndex = 0;  // Default to first column (id)
        $orderDirection = 'desc';
    }

    $columns = [
         'users.id', 
        'users.first_name', 
        'users.last_name', 
        'users.email', 
        'users.dob', 
        //  'users.gender', 
        'users.mobile', 
        'users.created_at', 
         'users.is_validate', 
        
    
    ];

    // Define the column to be used for ordering
    $orderColumn = $columns[$orderColumnIndex];


    $query->orderBy($orderColumn, $orderDirection);
    $userList = $query->paginate($perPage);
    
    return view('user.index', compact('userList', 'auth')); 
}
    public function pendingUsers(Request $request){ {
   
       $auth = getAuth();  
  
  
    $search = trim($request->query('search', null));
    $perPage = $request->query('perPage', 10);
  
    $query = User::query();
    $query->where('email', '!=', $auth->email);
    $query->where('is_validate', 0);
 if ($request->has('dateRange')) {
        $dates = explode(' to ', $request->get('dateRange'));
        if (count($dates) == 2) {
            try {
                $startDate = Carbon::parse($dates[0])->startOfDay();
                $endDate = Carbon::parse($dates[1])->endOfDay();
                $query->whereBetween('created_at', [$startDate, $endDate]);
            } catch (\Exception $e) {
                // Handle date parsing error
                return back()->withErrors(['dateRange' => 'Invalid date range provided.']);
            }
        }
    }
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('first_name', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('mobile', 'like', "%{$search}%")
                ->orWhere('gender', 'like', "%{$search}%")
                ->orWhere('dob', 'like', "%{$search}%")
                ->orWhere('created_at', 'like', "%{$search}%");
        });
    }
        
       // Handle ordering
    if ($request->has('orderColumnIndex') && $request->has('orderDirection')) {
        $orderColumnIndex = $request->input('orderColumnIndex');
        $orderDirection = $request->input('orderDirection');
    } else {
        // Default order column and direction
        $orderColumnIndex = 0;  // Default to first column (id)
        $orderDirection = 'desc';
    }

    $columns = [
         'users.id', 
        'users.first_name', 
        'users.last_name', 
        'users.email', 
        'users.dob', 
        //  'users.gender', 
        'users.mobile', 
        'users.created_at', 
         'users.is_validate', 
        
    
    ];

    // Define the column to be used for ordering
    $orderColumn = $columns[$orderColumnIndex];


    $query->orderBy($orderColumn, $orderDirection);
    $userList = $query->paginate($perPage); 
       
        return view('user.pending_account', compact('userList', 'auth')); 
    }

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
     
         $user = User::where('id', $id)->delete();
         Participant::where('user_id', $id)->delete();
        if ($user) {
            return back()->withSuccess('User deleted successfully!');
        } else {
            return back()->withError('User not deleted!');
        }
    }
    public function changeStatus(Request $request){
        $input = $request->all();
        $res =  User::where('id', $input['user_id'])->update(['status'=> $input['status']]);
      echo  response()->json(['success' => true]);
        if($input['status']){             
           // return response()->json(['success' => true, 'message' => 'User activated successfully']);
            return back()->withSuccess('User activated successfully');
        }else{
            //return response()->json(['success' => true, 'message' => 'User deactivated successfully']);
            return back()->withSuccess('User Deactivated successfully');
        }
       exit();
    }
    public function userData(){
         return response()->json(['success' => true]);
    }
  


        public function allAccountEexportCsv(Request $request)
        {
            $auth = getAuth();  
           $search = trim($request->query('search', null));
            $query = User::query();
        
            // Filter by date range if provided
          $query->where('email', '!=', $auth->email);
             if ($request->has('dateRange')) {
            $dates = explode(' to ', $request->get('dateRange'));
            if (count($dates) == 2) {
                try {
                    $startDate = Carbon::parse($dates[0])->startOfDay();
                    $endDate = Carbon::parse($dates[1])->endOfDay();
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                } catch (\Exception $e) {
                    // Handle date parsing error
                    return back()->withErrors(['dateRange' => 'Invalid date range provided.']);
                }
            }
            }
            
     $is_validate = true;
    if( $search =='Completed') {
          $is_validate = false;
          $query->where('is_validate',1);
    }
    if($search =='Pending') {
         $is_validate = false;
          $query->where('is_validate',0);
    }
    if( $is_validate){
         if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('mobile', 'like', "%{$search}%");
            });
        }
    }
        
            // Get the result
            $data =  $query->orderBy('id', 'DESC')->get();
        
            $response = new StreamedResponse(function() use ($data) {
                $handle = fopen('php://output', 'w');
        
                // Create CSV headers
                $headers = [
                    'S.no',
                    'First Name',
                    'Last Name',
                    'Email',
                    'Gender',
                    'Dob',
                    'Mobile',
                    'Registration Date',
                    'Validate Status',
                ];
        
                // Write headers to CSV
                fputcsv($handle, $headers);
        
                // Add data rows for each account
                foreach ($data as $index => $account) {
                    $commonData = [
                        $index + 1,
                        $account->first_name ?? '',
                        $account->last_name ?? '',
                        $account->email ?? '',
                        $account->gender ?? '',
                        $account->dob ?? '',
                        $account->country_code.' '.$account->mobile ?? '',
                        $account->created_at ? $account->created_at->format('Y-m-d H:i:s') : '',
                        $account->is_validate ? 'Completed' : 'Pending',
                    ];
        
                    // Write row to CSV
                    fputcsv($handle, $commonData);
                }
                fclose($handle);
            }, 200, [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="Account_'.Carbon::now()->format('Y-m-d_H-i-s').'.csv"',
            ]);
        
            return $response;
        }
        
          public function pendingAccountEexportCsv(Request $request)
        {
           $auth = getAuth();  
           $search = trim($request->query('search', null));
           $query = User::query();
        
            // Filter by date range if provided
         $query->where('email', '!=', $auth->email);
         $query->where('is_validate', 0);
             if ($request->has('dateRange')) {
            $dates = explode(' to ', $request->get('dateRange'));
            if (count($dates) == 2) {
                try {
                    $startDate = Carbon::parse($dates[0])->startOfDay();
                    $endDate = Carbon::parse($dates[1])->endOfDay();
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                } catch (\Exception $e) {
                    // Handle date parsing error
                    return back()->withErrors(['dateRange' => 'Invalid date range provided.']);
                }
            }
            }
            
            if ($search) {
           
                $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('mobile', 'like', "%{$search}%");
                });
            }
        
            // Get the result
            $data =  $query->orderBy('id', 'DESC')->get();
        
            $response = new StreamedResponse(function() use ($data) {
                $handle = fopen('php://output', 'w');
        
                // Create CSV headers
                $headers = [
                    'S.no',
                    'First Name',
                    'Last Name',
                    'Email',
                    'Gender',
                    'Dob',
                    'Mobile',
                    'Registration Date',
                    'Validate Status',
                ];
        
                // Write headers to CSV
                fputcsv($handle, $headers);
        
                // Add data rows for each account
                foreach ($data as $index => $account) {
                    $commonData = [
                        $index + 1,
                        $account->first_name ?? '',
                        $account->last_name ?? '',
                        $account->email ?? '',
                        $account->gender ?? '',
                        $account->dob ?? '',
                        $account->country_code.' '.$account->mobile ?? '',
                        $account->created_at ? $account->created_at->format('Y-m-d H:i:s') : '',
                        $account->is_validate ? 'Completed' : 'Pending',
                    ];
        
                    // Write row to CSV
                    fputcsv($handle, $commonData);
                }
                fclose($handle);
            }, 200, [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="Pending_account_'.Carbon::now()->format('Y-m-d_H-i-s').'.csv"',
            ]);
        
            return $response;
        }
}
