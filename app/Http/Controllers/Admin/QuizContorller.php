<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Competition, Quiz, QuestionType};

class QuizContorller extends Controller
{
    /**
     * Display a listing of the resource.
     */

  public function index(Request $request)
{
    $auth = getAuth(); 
    $search = trim($request->query('search', null));
    $competitionId = $request->query('competition_id', null);
    $perPage = $request->query('perPage', 10);

    $query = Quiz::with(['competition.participant', 'questionType']);

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('type', 'like', "%{$search}%");
        });
        
        $query->orWhereHas('competition', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%");
        });
    }

    if ($competitionId) {
        $query->where('competition_id', $competitionId);
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
         'quiz.id', 
         'quiz.title', 
        'quiz.type', 
         'quiz.competition_id', 
        
         
       
        	
    ];

    // Define the column to be used for ordering
    $orderColumn = $columns[$orderColumnIndex];
    // print_r( $orderColumn);die;
    $query->orderBy($orderColumn, $orderDirection);
    $data = $query->paginate($perPage);  

    $competitions = Competition::withCount(['participant as active_participants_count' => function ($query) {
        $query->where('status', 1);
    }])->get();

    return view('quiz.index', compact('data', 'auth', 'competitions'));
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
        $options = $input['options'];
        
        unset($input['options']);
        $res = Quiz::create($input)->id;
       
        foreach ($options as $key => $option) {
            if($option!=''){
                QuestionType::create(['question_id' => $res, 'option_value' => $option]);
            }
          
        }

        if ($res) {
            return back()->withSuccess('Question added successfully!');
        } else {
            return back()->withError('Question not added!');
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
    {
        $input = $request->all();
        //   print_r($input);die;
        unset($input['_token'], $input['_method']);
        //print_r($input['options']);die;
        // Check if options are present in the request
        // $que_type_id =  $input['que_type_id'];
        if (isset($input['options'])) {
            $options = $input['options'];          
            unset($input['options']);
        } else {
            $options = [];
        }
        if (isset($input['que_type_id'])) {
            $que_type_id = $input['que_type_id'];
            unset($input['que_type_id']);
        } else {
            $que_type_id = [];
        }
    
        // Update the quiz
        $res = Quiz::whereId($id)->update($input);
  
        // Handle options
        if (!empty($options)) {
            foreach ($options as $key=> $option) {
                if(isset($que_type_id[$key])){
                    QuestionType::whereId($que_type_id[$key])->update( ['question_id' => $id, 'option_value' => $option]);  
                }else{
                    QuestionType::create(             
                        ['question_id' => $id, 'option_value' => $option]
                    ); 
                }
               
            }
        }
        if ($res) {
            return back()->withSuccess('Question updated successfully!');
        } else {
            return back()->withError('Question not updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $res = Quiz::where('id', $id)->delete();
        if ($res) {
            return back()->withSuccess('Question deleted successfully!');
        } else {
            return back()->withError('Question not deleted!');
        }
    }
}
