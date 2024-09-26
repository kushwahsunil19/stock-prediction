@extends('frontend.layouts.master')
@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

<style>
    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-color: inherit;
        border-style: solid;
        border-width: 0;
        padding: 10px;
        color: #fff;
    }

    td.border {
        background-color: black;
    }

    .tokenbtn {
        color: #fff;
    }

    .heading {
        color: #fff;
    }

    .answer {
        width: 100%;
    }

    .suggestions {
        list-style-type: none;
        margin: 0;
        padding: 0;
        border: none;
        max-height: 150px;
        overflow-y: auto;
        background-color: #fff;
        width: 100%;
        position: relative;
        z-index: 1000;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 0 !important;
        border-radius: 0 !important;
    }

    .suggestions li {
        padding: 10px;
        cursor: pointer;
        color: black;
    }

    .suggestions li:hover {
        background-color: #f0f0f0;
    }

    .suggestions li.item_value {
        border-bottom: 1px solid #eee;
    }

    .suggestions li.item_value:last-child {
        border-bottom: none;
    }

    .custom-select-wrapper {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .custom-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="%23666" d="M7 10l5 5 5-5z"/></svg>') no-repeat right 10px center;
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 10px;
        padding-right: 30px;
        font-size: 16px;
        color: #333;
        width: 100%;
        box-sizing: border-box;
    }

    .custom-select:focus {
        border-color: #666;
        outline: none;
    }

    .table-bordered thead th {
        border-bottom-width: 2px;
        background-color: #44B2AA;
        color: white;
        text-align: center;
    }

    .error-message {
        color: #ff4700;
        font-size: 14px;
        margin-top: 5px;
        font-weight: 600;
        word-break: break-all; /* Ensures words break to fit within the container */
        white-space: normal;
     
    }

    @media (min-width: 1025px) {
        .single_competion {
            overflow: hidden;
        }
    }
</style>

<section class="body-bg">
    <div class="container">
        <div class="row justify-content-center">

            <h1 class="heading">Hi @if(Auth::check()){{Auth::user()->first_name }} {{Auth::user()->last_name }}@endif !</h1>
            <br>
            <h2 class="heading">{{ $data[0]->token_no }} Free token to use before  <span translate="no">{{ date('Y-m-d H:i', strtotime($participant->token_expiry_date)) }} UTC<span></span></h2>
            @php
          
            $remain_token = $data[0]->token_no - $participant->used_token ;
            $competitionId = Route::current()->parameter('id');
            @endphp
            <h2 class="heading">Remaining token : {{ $remain_token}}</h2>
        </div>
        <div class="text-white w-[20%] mx-auto flex flex-col justify-center mt-14">
            <a href="{{route('register', $competitionId)}}" class="btn btn-success participantNewbtn"> Participate in a new competition </a>
        </div>
        <p></p>
        <div class="table-responsive single_competion">
            <table class="table-auto border table-bordered">

                <thead>
                    @foreach($data as $res)
                    <tr class="bg-blue-300">
                        <th>Datetime of Validation</th>
                        <th class="border">Used token</th>
                        <th class="border">Selected days for the sprint</th>
                        @foreach($res->quiz as $que)
                        <th class="border">{{ $que->title}}</th>
                        @endforeach
                        <th class="border"></th>
                        <th class="border">Time Submitted</th>
                    </tr>
                </thead>
                @endforeach
                <tbody class="bg-gray-700 text-white">
                    @php
                    $previousDate = null;
                   $previousCreatedAt = null;
                    @endphp

                    @foreach ($participantCompetition as $key => $row)
                    
                    <form action="{{ route('post-answer') }}" method="POST" class="formData">
                     
                        @csrf
                           <input type="hidden" name="competition_id" value="{{ $competition_id }}">
                        <tr>
                          
                            @if ($previousDate !== $row->participant_date)
                             
                            <td rowspan="{{ $participantCompetition->where('participant_date', $row->participant_date)->count() }}" class="border"><span translate="no">{{ date('Y-m-d H:i:s', strtotime($row->participant_date)) }} UTC</span></td>
                            
           
                            @php
                            $previousDate = $row->participant_date;
                            @endphp
                            @endif
                          
                               @if ($previousCreatedAt !== date('Y-m-d H:i:s', strtotime($row->created_at)) )
                            <td class="border" rowspan="{{ $participantCompetition->where('created_at', $row->created_at)->count() }}">   {{ $row->token_used }}</td>
                              @php
                            $previousCreatedAt = date('Y-m-d H:i:s', strtotime($row->created_at))
                            @endphp
                               @endif
                            <td class="border"><span translate="no">{{ date('Y-m-d', strtotime($row->day)) }}  </span> <input type="hidden" name="id" value="{{ $row->id }}"></td>
                            @foreach ($row->participantAnswers as $answer)
                            <td class="border">

                                <input type="hidden" name="que_id[]" value="{{ $answer->question_id }}">
                                <input type="text" name="answer[]" class="form-control" value="{{ $answer->p_answer ?? '' }}" @if($row->answer_date != '') readonly @endif>
                            </td>
                            @endforeach
                            @php
                            $answeredQuestionIds = $row->participantAnswers->pluck('question_id')->toArray();
                            @endphp
                            @foreach ($res->quiz as $que)
                            @if (!in_array($que->id, $answeredQuestionIds))
                            <td class="border">
                                @if($row->answer_date != '')
                                <input type="text" class="form-control" value="" @if($row->answer_date != '') readonly @endif>
                                @else
                                <input type="hidden" name="que_id[]" value="{{ $que->id }}">
                                <div class="custom-select-wrapper">
                                    @if($que->type =='Decimal')
                                    <input type="hidden" value="{{ $que->id }}" class="que_id">
                                    <input type="text" value="" class="form-control answer decimal-ans"  data-id="{{ $row->id }}" name="answer[]" autocomplete="off" @foreach($que->questionType as $index => $queType) data-min="{{$queType->option_value }}" @if($index) data-max="{{$queType->option_value }}" @endif @endforeach required>
                                    <ul class="suggestions"></ul>
                                    <div class="error-message"></div>
                                    @else
                                    <select class="form-control answer custom-select" name="answer[]" required>
                                        <option value="">Please Select</option>
                                        @foreach($que->questionType as $index => $queType)
                                        <option value="{{ $queType->option_value }}">{{ $queType->option_value }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                @endif

                            </td>
                            @endif
                            @endforeach
                            <td class="border"> <button type="submit" class="btn btn-primary sendBtn{{ $row->id }}" @if($row->answer_date != '') disabled @endif>Send</button></td>
                            <td class="border">@if(isset($row->answer_date)) <span translate="no">{{ date('Y-m-d H:i:s', strtotime($row->answer_date)) }} UTC</span>@endif</td>
                        </tr>
                    </form>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br>
    </div>
</section>

<script>
    $(document).ready(function() {
        // Function to check if the entered value is within the min and max range
        function isValidDecimal($input) {
            var ans = parseFloat($input.val());
            var min = parseFloat($input.data('min'));
            var max = parseFloat($input.data('max'));

            return ans >= min && ans <= max;
        }

        // Function to display the error message
        function showErrorMessage($input, message) {
            var $errorMessage = $input.siblings('.error-message');
            $errorMessage.text(message);
        }

        // Function to clear the error message
        function clearErrorMessage($input) {
            var $errorMessage = $input.siblings('.error-message');
            $errorMessage.text('');
        }

        // Handle keyup event for decimal-ans inputs
        $(document).on('keyup', '.decimal-ans', function() {
            var $input = $(this);
            var id = $(this).data("id");
            var ans = $input.val();
            var min = parseFloat($input.data('min'));
            var max = parseFloat($input.data('max'));
            var suggestionsContainer = $input.siblings('.suggestions');

            if (ans !== '') {
                var list = [];
                for (var i = 0; i <= 9; i++) {
                    var formattedNumber = parseFloat(ans + i).toFixed(2);
                    if (formattedNumber >= min && formattedNumber <= max) {
                        list.push(formattedNumber);
                        $('.sendBtn' + id).attr('disabled', true);
                    }
                }

                updateSuggestions(list, suggestionsContainer, id);
            } else {
                suggestionsContainer.empty();
            }
        });

        // Function to update the suggestions list
        function updateSuggestions(list, container, id) {
            container.empty();

            list.forEach(function(item) {
                container.append('<li class="item_value" data-id="' + id + '">' + item + '</li>');
            });
        }

        // Handle click event for suggestion items
        $(document).on('click', '.item_value', function() {
            var id = $(this).data("id");
            var item_value = $(this).text();
            var suggestionsContainer = $(this).closest('.suggestions');
            var inputField = suggestionsContainer.siblings('.decimal-ans');
            inputField.val(item_value);
            suggestionsContainer.empty();
            clearErrorMessage(inputField); // Clear error message when a valid suggestion is clicked
            $('.sendBtn' + id).attr('disabled', false);
        });
        let isValid = false;
        // Handle input event for decimal-ans inputs
        $(document).on('input', '.decimal-ans', function(event) {
            var id = $(this).data("id");
            let isValid = true;
            var $input = $(this);
            var ans = parseFloat($input.val());

            var min = parseFloat($input.data('min'));
            var max = parseFloat($input.data('max'));

            // If the value is above the max allowed (20,000), clear the input and show a message
            if (isNaN(ans) || ans > max) {
                $input.val('');
                showErrorMessage($input, 'The maximum allowed value is ' + max);

                $('.sendBtn' + id).attr('disabled', true);
            } else if (ans < min || ans > max) {
                showErrorMessage($input, 'The minimum allowed value is ' + min);
                $('.sendBtn' + id).attr('disabled', true);

            } else {
                $('.sendBtn' + id).attr('disabled', true);
                  showErrorMessage($input, 'Enter a decimal and select a value from the dropdown.' );
                // clearErrorMessage($input); // Clear error message if the value is valid
            }

        });

        // Handle form submission


    });
</script>

@endsection