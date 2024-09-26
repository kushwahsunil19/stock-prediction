@extends('frontend.layouts.master')
@section('content')
<script>
    function selectNumber(element) {
        // Remove the "selected" class from all list items
        var listItems = document.querySelectorAll('.static-numbers li');
        listItems.forEach(function(item) {
            item.classList.remove('selected');
        });
        // Add the "selected" class to the clicked list item
        element.classList.add('selected');
    }
</script>
<style>
    a.btn.tokenbtn.selected-token {
        background: green;
        color: #fff;
    }

    .validation-button {
        float: right;
    }

    .tokenbtn {
        color: #fff;
    }

    #bordered-form-work {
        width: 100% !important;

        margin: 0 auto;
        padding: 10px;
        align-items: center;
        border: 1px solid #fffdfd;
        border-radius: 5px;
        background-color: #006699;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<section class="body-bg  ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11 form-container">
                <h1 class="flex text-3xl bg-green-500 rounded-sm w-100 h-23 items-center mx-auto font-bold justify-center sprint-color">
                   Registration for a sprint of this competition
                </h1>

                <form action="{{route('postRegister')}}" id="tokenForm" method="post">
                    @csrf
                    @php
                    $remaningToken = $data[0]->token_no - (isset($participant->used_token)?$participant->used_token:0);
                    @endphp
                    <input type="hidden" value="{{$competition_id}}" name="competition_id">
                    <div class="text-white flex flex-col justify-center mt-4 space-y-6">
                        <h1 class="text-2xl flex justify-center font-bold">You have {{$remaningToken}} token for this competition
                        </h1>

                        <h1 class="header-container">
                            How Many tokens to use ?&nbsp;
                            <input type="text" class="form-cotrol small-box useToken" value="Select" name="token_used" readonly><br>
                        </h1>
                        <div class="demo">
                            <p style="text-align: center;">Please select a token number. </p>

                            @for($i = 1; $i <= $remaningToken; $i++)<a class="btn tokenbtn @if($i==1) selected-token @endif" data-token="{{ $i }}">{{ $i }}</a> @endfor


                        </div>
                        <br>
                        @php
                        use Carbon\Carbon;
                        $currentDate = Carbon::now()->startOfDay(); // Get the current date and time, and set the time to the start of the day
                        $uncheckCount = 0;
                        @endphp
                        @foreach($participant->userRegisterDate as $key => $res)
                        @php
                        $regDate = Carbon::parse($res->reg_date)->startOfDay(); // Parse the registration date and set the time to the start of the day
                        $isPast = $regDate->lt($currentDate); // Check if the registration date is less than the current date
                       //$uncheckCount = ( $isPast)? 0: $uncheckCount +1;
                          $uncheckCount =  $uncheckCount +1;
                        @endphp                        
                        @endforeach
                        <?php if($uncheckCount >= $data[0]->sprint){
                        $uncheckCount = $data[0]->sprint;                        
                         }?>
                        <h1 class="text-2xl flex justify-center font-bold">Please Select {{$uncheckCount}} days. </h1>


                        <div class=" text-white flex flex-col w-[20%] mx-auto justify-center space-y-5 ">
                            <div class="scroll1">
                                <div class="row">


                                    @foreach($participant->userRegisterDate as $key => $res)
                                    @php
                                    $regDate = Carbon::parse($res->reg_date)->startOfDay(); // Parse the registration date and set the time to the start of the day
                                    $isPast = $regDate->lt($currentDate); // Check if the registration date is less than the current date
                                    @endphp
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="day[]" value="{{ $res->reg_date }}" id="flexCheckDefault{{ $key }}" {{ $isPast ? 'disabled' : '' }} />
                                            <label class="form-check-label" for="flexCheckDefault{{ $key }}"><span translate="no">
                                                {{ $regDate->format('Y-m-d') }} </span><span class="date-day-month"></span>
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>

                            </div>
                        </div>
                        <div class="outline mt-10 w-100 mx-auto" id="bordered-form-work">
                            <p id="form-border-text" class="text-white">Rules of competition</p>
                            <div class="scroll-container">
                                <div class="text-white">
                                    <div class="text-white scroll"> {!! $data[0]->rule_of_competition !!}</div>

                                </div>
                            </div>
                        </div>

                        <div class="w-100 mx-auto">
                            <div class="flex text-slate-50 justify-between mt-5">
                                <div>
                                    <input type="checkbox" name="agree" value="1" required>
                                    <label for="">I agree</label>
                                    <button type="submit" class="btn btn-success w-40 validation-button">Validation</button>
                                    <!-- <button class="bg-green-500 p-2 font-bold rounded-sm"> Validation </button> -->
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    // $(document).ready(function() {
    //     $('#tokenForm').on('submit', function(event) {
    //         var selectedDays = $('input[name="day[]"]:checked').length;
    //         if (selectedDays > 3) {
    //             alert('Please select 3 days.');
    //             event.preventDefault();
    //         } else if (selectedDays === 1) {
    //             alert('Please select 3 days.');
    //             event.preventDefault();
    //         } else if (selectedDays === 2) {
    //             alert('Please select 3 days.');
    //             event.preventDefault();
    //         }
    //     });
    //     $('.demo').hide();

    // });
    $(document).ready(function() {
        var allowedDays = <?php echo $uncheckCount ?>; // Get the allowed number of days from server-side variable

        $('#tokenForm').on('submit', function(event) {
            var selectedDays = $('input[name="day[]"]:checked').length;

            if (selectedDays !== allowedDays) {
                alert('Please select exactly ' + allowedDays + ' days.');
                event.preventDefault();
            }
        });

        $('.demo').hide();
    });
    $(document).on('click', '.tokenbtn', function() {
        var token_no = $(this).data("token")
        $('.useToken').val(token_no);
        $('.tokenbtn').removeClass('selected-token');
        $(this).addClass('selected-token');
        $('.demo').hide();

    });
    $(document).on('click', '.useToken', function() {
        $('.demo').show();
    });
</script>

@endsection