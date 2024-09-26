@extends('layouts.master')
@php
$perPage = request()->query('perPage', 10);

if (Auth::check() && Auth::user()->role_type == 'superadmin')
{
$admin = true;
}else{
$admin = false;
}

@endphp
<!DOCTYPE html>
<html lang="en">
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participant</title>

    @section('styles')
    <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <style>
        .dataTable>thead>tr>th[class*="sort"]:before,
        .dataTable>thead>tr>th[class*="sort"]:after {
            content: "" !important;
        }

        #resultTable th {
            padding: 10px;
        }

        div#resultTable_info {
            display: none !important;
        }

        .flex.justify-between.flex-1.sm\:hidden {
            display: none !important;
        }

        div#resultTable_paginate {
            display: none !important;
        }

        th {
            white-space: nowrap;
        }

        td {
            white-space: nowrap;
        }

        .dialogue-width {
            min-width: 750px !important;
        }

        .status {
            cursor: pointer;
            min-width: 77px;
            height: 35px;
            margin: 5px 10px;
        }

        .btn-primary {
            color: #fff !important;
            background: green !important;
            border-color: green !important;
        }

        .btn-primary:hover {
            color: #fff !important;
            background: green !important;
            border-color: green !important;
        }

        .btn-primary1 {
            color: #000000 !important;
            background: red !important;
            border-color: red !important;
        }

        .btn-primary1:hover {
            color: #000000 !important;
            background: red !important;
            border-color: red !important;
        }

        .btn-primary2 {
            color: #000000 !important;
            background: red !important;
            border-color: red !important;
        }

        .btn-primary2:hover {
            color: #000000 !important;
            background: red !important;
            border-color: red !important;
        }

        #swal2-content {
            font-size: 1em !important;
            font-weight: bold !important;
        }

        .editor {
            padding: 11px;
        }

        .content-description {
            word-wrap: break-word;
            word-break: break-all;
            white-space: normal;
        }
    </style>
    @endsection
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
    <!-- Add this line to your @section('scripts') -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @section('content')

</head>

<body>

    <!-- PAGE-HEADER -->
    <!-- Button trigger modal -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">Participant Competitions</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);" style="text-decoration: none;">{{ucwords($auth->role_type)}}</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="padding-left: 0px;">Participant Competitions</li>
            </ol>
        </div>
    </div>
    <!--<form method="GET" action="{{ route('participants.filter') }}">-->
    <!--    <div class="row mb-3">-->
    <!--        <div class="col">-->
    <!--            <input type="hidden" value="{{$participant_id}}" name="id">-->
    <!--            <input type="text" value="{{\Request::get('dateRange')}}" id="dateRange" name="dateRange" class="form-control" placeholder="Select date range">-->
    <!--        </div>-->
    <!--        <div class="col">-->
    <!--            <button type="submit" class="btn btn-primary">Apply </button>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</form> -->
    <!-- PAGE-HEADER END -->
    <!-- CONTAINER -->
    <div class="main-container container-fluid">
        <!-- Start::Row-1 -->

        <!--<a href="{{ route('participants.exportCsv',['id'=>$participant_id,'dateRange'=>Request::get('dateRange')]) }}" class="btn btn-primary">Download CSV</a>-->
        <!-- Flash messages will be displayed here -->
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                @if($admin)
                <div>
                    <!-- 
                    <button style="padding: 10px 20px; margin: 10px;" data-bs-toggle="modal" data-bs-target="#addaccountModal" class="btn btn-primary" id="accountBtn">
                        <i class="fa fa-plus fa-lg" aria-hidden="true"></i> Add Quiz
                    </button> -->
                </div>

                <!-- Add Account Modal -->
                <div class="modal fade" id="addaccountModal" tabindex="-1" aria-labelledby="addaccountModalLabel" aria-hidden="true">
                    <div class="modal-dialog dialogue-width modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addaccountModalLabel">Add New Quiz</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Add Account Form -->
                                <form id="addaccountForm" method="POST" action="{{ route('participants.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="package" class="form-label">Title </label>
                                            <input type="text" class="form-control" id="title" name="title" required>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="package" class="form-label">Option1 </label>
                                            <input type="text" class="form-control" id="option1" name="option1" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="package" class="form-label">Option2 </label>
                                            <input type="text" class="form-control" id="option2" name="option2" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="package" class="form-label">Option3 </label>
                                            <input type="text" class="form-control" id="option3" name="option3" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="package" class="form-label">Option4 </label>
                                            <input type="text" class="form-control" id="option4" name="option4" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="package" class="form-label">Competition </label>
                                            <select class="form-control" name="competition_id">
                                                <option value="">Select Competition</option>

                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="package" class="form-label">Answer </label>
                                            <input type="text" class="form-control" id="answer" name="answer" required>
                                        </div>

                                    </div>
                                    <p></p>



                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="card-header">
                    <h3 class="card-title mb-0">@if(isset($data[0]->competition->name)) {{ $data[0]->competition->name }} @endif</h3>
                </div>


                <div class="card-body pt-4">
                    <div class="grid-margin">
                        <div class="table-responsive">
                            <!-- Credit Card List Table -->
                            <table class="table" id="resultTable">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Mobile</th>
                                        <th>Datetime of Validation</th>
                                        <th>Used Token</th>
                                       
                                        <th>Time Submitted</th>
                                        <th>Competition Status</th>
                                        <th>Selected days for the sprint</th>
                                        <th>Questions</th>
                                        <th>Answers</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $loopIndex => $res)
                                    <tr>
                                        <td>{{ $loop->iteration + $data->firstItem() - 1 }}</td>
                                        <td>{{ $res->participant->user->first_name }}</td>
                                        <td>{{ $res->participant->user->last_name }}</td>
                                        <td>{{ $res->participant->user->email }}</td>
                                        <td>{{ $res->participant->user->gender }}</td>
                                        <td>{{ $res->participant->user->country_code }} {{ $res->participant->user->mobile }}</td>
                                        <td>{{ \Carbon\Carbon::parse($res->participant_date)->format('Y-m-d H:i:s') }}</td>
                                        <td>{{ $res->token_used }}</td>
         
                                        <td>@if($res->answer_date != ''){{ \Carbon\Carbon::parse($res->answer_date)->format('Y-m-d H:i:s') }} @endif</td>
                                        <td>@if($res->answer_date != '') Complete @else In progress @endif</td>
                                        <td>
                                            
                                          {{ \Carbon\Carbon::parse($res->day)->format('Y-m-d') }} 
                                       </td>
                                        <td>
                                            @foreach($res->competition->quiz as $que)
                                            <p>{{ $que->title }} </p>
                                            @endforeach
                                        
                                          
                                        </td>
                                        <td>
                                            @if($res->answer_date != '')
                                            @foreach($res->participantAnswers as $answer)
                                            <p>{{ $answer->p_answer }}</p>
                                            @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        {{ $data->appends(['perPage' => $perPage])->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTAINER END -->
    @endsection


    <!-- end credit card popup -->
    @section('scripts')
    <!-- Quill Editor JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Internal Quill JS -->
    @vite('resources/assets/js/quill-editor.js')
    <!-- INTERNAL APEXCHART JS -->
    <script src="{{ asset('build/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Color Picker JS -->
    <script src="{{ asset('build/assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

    <!-- Checkbox selectall JS -->
    @vite('resources/assets/js/checkbox-selectall.js')

    <!-- INTERNAL INDEX JS -->
    @vite('resources/assets/js/index1.js')


    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(document).ready(function() {
            $('#resultTable').DataTable({
                // "lengthMenu": [10, 25, 50, 100],
                // "pageLength": 10, // Default page length
                "lengthChange": false,
                  "ordering": false,
                "searching": false,
                "columnDefs": [{
                    "targets": [-1, -2], // Targets the last two columns
                    "orderable": false // Sets the last two columns to be not orderable
                }]

            });
        });
    </script>

    <script>
        $(document).ready(function() {
            flatpickr('#dateRange', {
                mode: 'range',
                dateFormat: 'Y-m-d',
            });

        });
    </script>
    @endsection
</body>

</html>