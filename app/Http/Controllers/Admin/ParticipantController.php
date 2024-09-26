<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Participant,ParticipantCompetition,Quiz,Competition};
use Symfony\Component\HttpFoundation\StreamedResponse;
use Carbon\Carbon; 
class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $auth = getAuth();
    $search = trim($request->query('search', null));
    $perPage = $request->query('perPage', 10);

    $query = Participant::with(['competition', 'user'])
        ->where('participants.status', 1);  // Specify table name

    // Filter by date range
    if ($request->has('dateRange')) {
        $dates = explode(' to ', $request->get('dateRange'));
        if (count($dates) == 2) {
            $startDate = $dates[0];
            $endDate = $dates[1];
            $query->whereBetween('participants.created_at', [$startDate, $endDate]);  // Specify table name
        }
    }

    // Filter by competition ID
    if ($request->input('competition_id')) {
        $query->where('participants.competition_id', $request->input('competition_id'));  // Specify table name
    }

    // Search in related user model
    if ($search) {
        
        $query->whereHas('user', function ($q) use ($search) {
            $q->where('first_name', 'like', "%{$search}%")
              ->orWhere('last_name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('mobile', 'like', "%{$search}%")
              ->orWhere('gender', 'like', "%{$search}%");
              
        });
         $query->orWhere(function ($q) use ($search) {
                $q->orWhere('created_at', 'like', "%{$search}%");
                  
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
         'participants.id', 
        'users.first_name', 
        'users.last_name', 
        'users.email', 
        'users.gender', 
        'users.mobile', 
        'competitions.name',  
        'participants.used_token', 
        'participants.created_at', 
        
        
    
    ];

    // Define the column to be used for ordering
    $orderColumn = $columns[$orderColumnIndex];
   
    // Apply joins based on the order column
    if (strpos($orderColumn, 'users.') !== false) {
        $query->join('users', 'participants.user_id', '=', 'users.id');
    } elseif (strpos($orderColumn, 'competitions.') !== false) {
        $query->join('competitions', 'participants.competition_id', '=', 'competitions.id');
    }

    $query->orderBy($orderColumn, $orderDirection);

    // Get the paginated result
    $data = $query->paginate($perPage);

    // Fetch competitions with participants
    $competitions = Competition::with('participant')->get();

    return view('participant.index', compact('data', 'competitions', 'auth'));
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
    public function show(Request $request,string $id)
    {
        $auth =  getAuth();  
        $perPage = 10; 
        // Check if the request contains a custom pagination limit
        if ($request->has('perPage')) {
            $perPage = $request->input('perPage'); 
        }
        // Fetching records with pagination based on the provided limit
        // $data = Participant::with(['competition','user'])->where('id',$id)->paginate($perPage); 
      
        $data =  ParticipantCompetition::with(['participant','participantAnswers.question','competition','user'])->where('participant_id',$id)->paginate($perPage);
        $participant_id = $id;
 
        return view('participant.participant_view', compact('data', 'auth','participant_id')); 
        //
    }

     /**
     * Display the specified resource.
     */
    // public function exportCsv($id)
    // {
    //     $data = ParticipantCompetition::with([
    //         'participant',
    //         'participantAnswers.question',
    //         'competition',
    //         'user'
    //     ])->where('participant_id', $id)->get();
    
    //     $dateTime = Carbon::now()->format('d-m-Y_H-i-s');
    
    //     $response = new StreamedResponse(function() use ($data) {
    //         $handle = fopen('php://output', 'w');
    //         // Add CSV headers
    //         fputcsv($handle, [
    //             'S.no',
    //             'First Name',
    //             'Last Name',
    //             'Email',
    //             'Datetime of Validation',
    //             'Used Token',
    //             'Time Submitted',
    //             'Competition Status',
    //             'Question',
    //             'Answer'
    //         ]);
    
    //         // Add data rows for each question and answer
    //         foreach ($data as $index => $participant) {
    //             foreach ($participant->participantAnswers as $answer) {
    //                 $question = $answer->question->title; // Fetch the question text
    //                 $answerText = $answer->p_answer;
    //                 $firstName = $participant->user->first_name; // Fetch the user's first name
    //                 $lastName = $participant->user->last_name; // Fetch the user's last name
    //                 $email = $participant->user->email; // Fetch the user's email
    
    //                 fputcsv($handle, [
    //                     $index + 1,
    //                     $firstName,
    //                     $lastName,->orderBy('created_at', 'DESC')->
    //                     $email,
    //                     $participant->participant_date,
    //                     $participant->token_used,
    //                     $participant->answer_date,
    //                     $participant->answer_date ? 'Complete' : 'In progress',
    //                     $question,
    //                     $answerText,
    //                 ]);
    //             }
    //         }
    //         fclose($handle);
    //     }, 200, [
    //         'Content-Type' => 'text/csv',
    //         'Content-Disposition' => 'attachment; filename="participant_result_'.$dateTime.'.csv"',
    //     ]);
    
    //     return $response;
    // }Request $request
//     public function exportCsv($id)
// {
//     $data = ParticipantCompetition::with([
//         'participant',
//         'participantAnswers.question',
//         'competition',
//         'user'
//     ])->where('participant_id', $id)->get();

//     $dateTime = Carbon::now()->format('d-m-Y_H-i-s');

//     $response = new StreamedResponse(function() use ($data) {
//         $handle = fopen('php://output', 'w');

//         // Determine the maximum number of questions answered by any participant
//         $maxQuestions = 0;
//         foreach ($data as $participant) {
//             $questionsCount = $participant->participantAnswers->count();
//             if ($questionsCount > $maxQuestions) {
//                 $maxQuestions = $questionsCount;
//             }
//         }

//         // Create CSV headers
//         $headers = [
//             'S.no',
//             'First Name',
//             'Last Name',
//             'Email',
//             'Datetime of Validation',
//             'Used Token',
//             'Time Submitted',
//             'Competition Status'
//         ];

//         // Add dynamic question and answer headers
//         for ($i = 1; $i <= $maxQuestions; $i++) {
//             $headers[] = "Question $i";
//             $headers[] = "Answer $i";Request $request
//         }

//         // Write headers to CSV
//         fputcsv($handle, $headers);

//         // Add data rows for each participant
//         foreach ($data as $index => $participant) {
//             $firstName = $participant->user->first_name; // Fetch the user's first name
//             $lastName = $participant->user->last_name; // Fetch the user's last name
//             $email = $participant->user->email; // Fetch the user's email
//             $commonData = [
//                 $index + 1,
//                 $firstName,
//                 $lastName,
//                 $email,
//                 $participant->participant_date,
//                 $participant->token_used,
//                 $participant->answer_date,
//                 $participant->answer_date ? 'Complete' : 'In progress'
//             ];

//             // Collect questions and answers
//             $questionsAndAnswers = [];
//             foreach ($participant->participantAnswers as $answer) {
//                 $questionsAndAnswers[] = $answer->question->title; // Question text
//                 $questionsAndAnswers[] = $answer->p_answer; // Answer text
//             }

//             // Fill remaining columns with empty values if needed
//             while (count($questionsAndAnswers) < $maxQuestions * 2) {
//                 $questionsAndAnswers[] = ''; // Add empty columns for unanswered questions
//                 $questionsAndAnswers[] = ''; // Add empty columns for unanswered answers
//             }

//             // Combine common data with questions and answers
//             $rowData = array_merge($commonData, $questionsAndAnswers);
            
//             // Write row to CSVRequest $request
//             fputcsv($handle, $rowData);
//         }
//         fclose($handle);
//     }, 200, [
//         'Content-Type' => 'text/csv',
//         'Content-Disposition' => 'attachment; filename="participant_result_'.$dateTime.'.csv"',
//     ]);

//     return $response;
// }
public function exportCsv($id=null, $dataRange =null, $search = null)
{
   
    $query = ParticipantCompetition::with(['participant','participantAnswers','competition','user']);

    // Get participant ID from request
   
  
    $query->where('participant_id',$id);

    // Filter by date range if provided
    if ($dataRange) {
        $dates = explode(' to ', $dataRange);
        if (count($dates) == 2) {
            $startDate = $dates[0];
            $endDate = $dates[1];
            $query->whereBetween('participant_date', [$startDate, $endDate]);
        }
    }
 // Search in related user model
    if ($search) {
        $query->whereHas('user', function ($q) use ($search) {
            $q->where('first_name', 'like', "%{$search}%")
              ->orWhere('last_name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('mobile', 'like', "%{$search}%");
        });
    }
    // Get the paginated result
    $data = $query->get();  
    $dateTime = Carbon::now()->format('d-m-Y_H-i-s');

    $response = new StreamedResponse(function() use ($data) {
        $handle = fopen('php://output', 'w');

        // Determine the maximum number of questions answered by any participant
        $maxQuestions = 0;
        foreach ($data as $participant) {
            $questionsCount = $participant->participantAnswers->count();
            if ($questionsCount > $maxQuestions) {
                $maxQuestions = $questionsCount;
            }
        }

        // Create CSV headers
        $headers = [
            'S.no',
            'First Name',
            'Last Name',
            'Email',
            'Gender',
            'Dob',
            'Mobile',
            'Datetime of Validation',
            'Used Token',
             'Selected days for the sprint',
            'Time Submitted',
            'Competition Status'
        ];

        // Add dynamic question and answer headers
        for ($i = 1; $i <= $maxQuestions; $i++) {
            $headers[] = "Question $i";
            $headers[] = "Answer $i";
        }

        // Write headers to CSV
        fputcsv($handle, $headers);

        // Add data rows for each participant
        foreach ($data as $index => $participant) {
            $firstName = $participant->user->first_name; // Fetch the user's first name
            $lastName = $participant->user->last_name; // Fetch the user's last name
            $email = $participant->user->email; // Fetch the user's email
            $gender = $participant->user->gender; // Fetch the user's email
            $mobile = $participant->user->mobile; // Fetch the user's email
            $dob = $participant->user->dob; // Fetch the user's email
            $commonData = [
                $index + 1,
                $firstName,
                $lastName,
                $email,
                $gender,
                $dob,
                $mobile,
                $participant->participant_date,
                $participant->token_used,
                $participant->day,
                $participant->answer_date,
                $participant->answer_date ? 'Complete' : 'In progress'
            ];

            // Collect questions and answers
            $questionsAndAnswers = [];
            foreach ($participant->participantAnswers as $answer) {
                $questionsAndAnswers[] = $answer->question->title; // Question text
                $questionsAndAnswers[] = $answer->p_answer; // Answer text
            }

            // Fill remaining columns with empty values if needed
            while (count($questionsAndAnswers) < $maxQuestions * 2) {
                $questionsAndAnswers[] = ''; // Add empty columns for unanswered questions
                $questionsAndAnswers[] = ''; // Add empty columns for unanswered answers
            }

            // Combine common data with questions and answers
            $rowData = array_merge($commonData, $questionsAndAnswers);

            // Write row to CSV
            fputcsv($handle, $rowData);
        }
        fclose($handle);
    }, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="participant_result_'.$dateTime.'.csv"',
    ]);

    return $response;
}

public function allUserEexportCsv(Request $request){
    $search = trim($request->query('search', null));
    $competition_id = trim($request->query('competition_id', null));
    $participant_ids = Participant::where('status', 1)->pluck('id')->toArray();
    $query = ParticipantCompetition::with(['participant','participantAnswers','competition','user']);
    // Get participant ID from request   
  
     $query->whereIn('participant_id', $participant_ids);

    // Filter by date range if provided
    if ($request->has('dateRange')) {
        $dates = explode(' to ', $request->get('dateRange'));
        if (count($dates) == 2) {
            $startDate = $dates[0];
            $endDate = $dates[1];
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
    }
    if ($competition_id) {
        $query->where('competition_id',$competition_id);
    }
     // Search in related user model
    if ($search) {
        $query->whereHas('user', function ($q) use ($search) {
            $q->where('first_name', 'like', "%{$search}%")
              ->orWhere('last_name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('mobile', 'like', "%{$search}%");
        });
    }
    // Get the paginated result
    $data = $query->orderBy('created_at', 'DESC')->get();  
    // Get the paginated result

    $dateTime = Carbon::now()->format('d-m-Y_H-i-s');

    $response = new StreamedResponse(function() use ($data) {
        $handle = fopen('php://output', 'w');

        // Determine the maximum number of questions answered by any participant
        $maxQuestions = 0;
        foreach ($data as $participant) {
            $questionsCount = $participant->participantAnswers->count();
            if ($questionsCount > $maxQuestions) {
                $maxQuestions = $questionsCount;
            }
        }

        // Create CSV headers
        $headers = [
            'S.no',
            'First Name',
            'Last Name',
            'Email',
            'Gender',
            'Dob',
            'Mobile',
            'competition',
            'Datetime of Validation',
            'Used Token',
            'Selected days for the sprint',
            'Time Submitted',
            'Competition Status'
        ];

        // Add dynamic question and answer headers
        for ($i = 1; $i <= $maxQuestions; $i++) {
            $headers[] = "Question $i";
            $headers[] = "Answer $i";
        }

        // Write headers to CSV
        fputcsv($handle, $headers);

        // Add data rows for each participant
        foreach ($data as $index => $participant) {
            $firstName = $participant->user->first_name; // Fetch the user's first name
            $lastName = $participant->user->last_name; // Fetch the user's last name
            $email = $participant->user->email; // Fetch the user's email
            $gender = $participant->user->gender; // Fetch the user's email
            $mobile = $participant->user->country_code.' '. $participant->user->mobile; // Fetch the user's email
            $dob = $participant->user->dob; // Fetch the user's email
            $commonData = [
                $index + 1,
                $firstName,
                $lastName,
                $email,
                $gender,
                $dob,
                $mobile,
                $participant->competition->name,
                $participant->participant_date,
                $participant->token_used,
                $participant->day,
                $participant->answer_date,
                $participant->answer_date ? 'Complete' : 'In progress'
            ];

            // Collect questions and answers
            $questionsAndAnswers = [];
            foreach ($participant->participantAnswers as $answer) {
                $questionsAndAnswers[] = $answer->question->title; // Question text
                $questionsAndAnswers[] = $answer->p_answer; // Answer text
            }

            // Fill remaining columns with empty values if needed
            while (count($questionsAndAnswers) < $maxQuestions * 2) {
                foreach ($participant->competition->quiz as $que) {
                $questionsAndAnswers[] = $que->title; // Add empty columns for unanswered questions
                $questionsAndAnswers[] = ''; // Add empty columns for unanswered answers
                }
            }

            // Combine common data with questions and answers
            $rowData = array_merge($commonData, $questionsAndAnswers);

            // Write row to CSV
            fputcsv($handle, $rowData);
        }
        fclose($handle);
    }, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="participant_result_'.$dateTime.'.csv"',
    ]);

    return $response;
}
public function filter(Request $request)
{
    $auth =  getAuth();
    
    // Default items per page
    $perPage = 10;

    // Check if the request contains a custom pagination limit
    if ($request->has('perPage')) {
        $perPage = $request->input('perPage');
    }

    $query = ParticipantCompetition::with(['participant','participantAnswers','competition','user']);

    // Get participant ID from request
   
    $participant_id = $request->get('id');
    $query->where('participant_id', $participant_id);

    // Filter by date range if provided
    if ($request->has('dateRange')) {
        $dates = explode(' to ', $request->get('dateRange'));
        if (count($dates) == 2) {
            $startDate = $dates[0];
            $endDate = $dates[1];
            $query->whereBetween('participant_date', [$startDate, $endDate]);
        }
    }

    // Get the paginated result
    $data = $query->paginate($perPage);
    
    return view('participant.participant_view', compact('data', 'auth','participant_id')); 
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
       
        $res = Participant::where('id',$id)->delete();    
        if ($res) {
            return back()->withSuccess('Participant deleted successfully!');
        } else {
            return back()->withError('Participant not deleted!');
        }
    }
}
