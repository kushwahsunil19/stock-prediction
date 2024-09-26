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
    <title>Question</title>

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

        .custom-select-wrapper::after {
            content: '\f0d7';
            /* FontAwesome down arrow */
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            top: 50%;
            right: 10px;
            pointer-events: none;
            transform: translateY(-50%);
        }
        .dataTables_filter{
            display:none;
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
        <h1 class="page-title">Question</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);" style="text-decoration: none;">{{ucwords($auth->role_type)}}</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="padding-left: 0px;">Question</li>
            </ol>
        </div>
    </div>
            <form method="GET" action="{{ route('questions.index') }}">
                        <div class="row mb-3">
                         
                        <div class="col">
                                <input type="text" value="{{\Request::get('search')}}" id="search" name="search" class="form-control" placeholder="Search...">
                        </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Apply </button>
                            </div>
                        </div>
                    </form>
    <!-- PAGE-HEADER END -->
    <!-- CONTAINER -->
    <div class="main-container container-fluid">
        <!-- Start::Row-1 -->

        <!-- Flash messages will be displayed here -->
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                @if($admin)
                <div>
                    @foreach ($competitions as $com)
                    @php
                    $status = 0;
                    @endphp
                    @if($com->active_participants_count ==0 )
                    @php
                    $status = 1;
                    @endphp
                    @endif
                    @endforeach
                    @if( $status)
                    <button style="padding: 10px 20px; margin: 10px;" data-bs-toggle="modal" data-bs-target="#addaccountModal" class="btn btn-primary" id="accountBtn">
                        <i class="fa fa-plus fa-lg" aria-hidden="true"></i> Add Question
                    </button>
                    @endif
                </div>

                <!-- Add Account Modal -->
                <div class="modal fade" id="addaccountModal" tabindex="-1" aria-labelledby="addaccountModalLabel" aria-hidden="true">
                    <div class="modal-dialog dialogue-width modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addaccountModalLabel">Add New Question</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Add Account Form -->
                                <form id="addaccountForm" method="POST" action="{{ route('questions.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="package" class="form-label">Competition </label>
                                            <select class="form-control" name="competition_id">
                                                <!-- <option value="">Select Competition</option> -->
                                                @foreach ($competitions as $com)
                                                @if($com->active_participants_count ==0 )
                                                <option value="{{$com->id}}"> {{ $com->name}} </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="package" class="form-label">Type </label>
                                            <select class="form-control" id="typeSelect" name="type">
                                                <option value="Decimal">Decimal</option>
                                                <option value="Option">Option</option>
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label for="package" class="form-label">Question </label>
                                            <input type="text" class="form-control" id="title" name="title" required>
                                        </div>

                                        <div id="option-fields-container" class="col-md-12 mb-2 option-field">
                                            <div class="row">
                                                <div class="col-md-5 mb-2">
                                                    <label for="option1" class="form-label">Option 1 </label>
                                                    <input type="text" class="form-control" name="options[]">
                                                </div>
                                                <div class="col-md-5 mb-2">
                                                    <label for="option2" class="form-label">Option 2 </label>
                                                    <input type="text" class="form-control" name="options[]">
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="decimalDiv">

                                        </div>


                                        <div class="col-md-12 mb-2 option-field">
                                            <button type="button" id="add-option-button" class="btn btn-secondary">Add Option</button>
                                        </div>

                                        <!-- <div class="col-md-12 mb-2 answerTxt">
                                            <label for="package" class="form-label">Answer </label>
                                            <input type="text" class="form-control" id="answer" name="answer">
                                        </div> -->

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
                    <h3 class="card-title mb-0"> Question List</h3>
                </div>


                <div class="card-body pt-4">
                    <div class="grid-margin">
                        <div class="table-responsive">
                            <!-- Credit Card List Table -->
                            <table class="table" id="resultTable">
                                <thead>
                                    <tr>
                                        <th>S.no</th>

                                        <th>Question</th>
                                        <th>Question Type</th>
                                        <!-- <th>Answer</th> -->
                                        <th>Competition</th>

                                        @if($admin)
                                        <th>Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through Credit Card data and populate the table -->
                                    @php $status = 0; @endphp
                                    @foreach($data as $loopIndex => $res)
                                    @php $status = 0; @endphp
                                    @foreach ($res->competition->participant as $row )

                                    @if($row->competition_id == $res->competition->id)
                                    @php $status = $row->status; @endphp
                                    @endif
                                    @endforeach
                                    <tr>
                                        <td>{{ $loop->iteration + $data->firstItem() - 1 }}</td>
                                        <td>{{ $res->title }} </td>
                                        <td>{{ $res->type }}</td>
                                        <!-- <td>
                                            <p class="content-description">{{ $res->answer }}</p>
                                        </td> -->
                                        <td>{{ $res->competition->name }}</td>
                                        @if($admin)

                                        <td>
                                            @if ( $status)

                                            @else
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editpujaModal{{ $res->id }}">
                                                Edit
                                            </button>
                                            <form action="{{ route('questions.destroy', $res->id) }}" method="Post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this competition?')">Delete</button>
                                            </form>
                                            @endif

                                        </td>
                                        @endif
                                    </tr>
                                    <div class="modal fade" id="editpujaModal{{ $res->id }}" tabindex="-1" aria-labelledby="editpujaModalLabel{{ $res->id }}" aria-hidden="true">
                                        <div class="modal-dialog dialogue-width modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editpujaModalLabel{{ $res->id }}">Edit Competition</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="editForm{{ $res->id }}" method="POST" action="{{ route('questions.update', $res->id) }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="row">
                                                            <div class="col-md-6 mb-2">
                                                                <label for="competitionSelect{{ $res->id }}" class="form-label">Competition</label>
                                                                <select class="form-control" name="competition_id" id="competitionSelect{{ $res->id }}">
                                                                    <!-- <option value="">Select Competition</option> -->
                                                                    @foreach ($competitions as $com)
                                                                    <option value="{{ $com->id }}" @if ($res->competition_id == $com->id) selected @endif>{{ $com->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label for="typeSelect{{ $res->id }}" class="form-label">Type</label>
                                                                <select class="form-control typeSelectEdit" id="typeSelect{{ $res->id }}" name="type" data-id="{{ $res->id }}">
                                                                    <option value="Decimal" @if ($res->type == 'Decimal') selected @endif>Decimal</option>
                                                                    <option value="Option" @if ($res->type == 'Option') selected @endif>Option</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-12 mb-2">
                                                                <label for="title{{ $res->id }}" class="form-label">Question </label>
                                                                <input type="text" class="form-control" id="title{{ $res->id }}" name="title" value="{{ $res->title }}" required>
                                                            </div>
                                                            <div id="option-fields-container{{ $res->id }}" class="col-md-12 mb-2 option-fields-container">
                                                                <div class="row">

                                                                    @foreach($res->questionType as $index => $queType)


                                                                    <div class="col-md-6 mb-2">
                                                                        <label for="option{{ $index + 1 }}{{ $res->id }}" class="form-label">@if ($res->type == 'Decimal') Range {{ $index + 1 }} @else Option {{ $index + 1 }} @endif</label>
                                                                        <input type="hidden" name="que_type_id[]" value="{{ $queType->id }}">
                                                                        <input type="text" class="form-control" name="options[]" value="{{ $queType->option_value }}">
                                                                    </div>

                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-12 mb-2 option-fields-container">
                                                                <button type="button" class="btn btn-secondary add-option-button2" data-id="{{ $res->id }}">Add Option</button>
                                                            </div> -->
                                                            <!-- @if ($res->type == 'Option')
                                                            <div class="col-md-12 mb-2 answerTxtEdit{{ $res->id }}">
                                                                <label for="answer{{ $res->id }} " class="form-label">Answer</label>
                                                                <input type="text" class="form-control" id="answer{{ $res->id }}" name="answer" value="{{ $res->answer }}">
                                                            </div>
                                                            @endif -->
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        @endforeach

                        </tbody>
                        </table>
                    </div>
                      {{ $data->appends(request()->query())->links() }}
                  

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

    <script>
           $(document).ready(function() {
        var urlParams = new URLSearchParams(window.location.search);
        var orderColumnIndex = urlParams.get('orderColumnIndex') || 1; // Default to the second column (index 1)
        var orderDirection = urlParams.get('orderDirection') || 'asc';

        $('#resultTable').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            // "order": [[orderColumnIndex, orderDirection]],
            "columnDefs": [
                {
                    "targets": [0,4], // The first column (S.no)
                    "orderable": false // Disable ordering for this column
                },
                {
                    "targets": [-1, -2], // The last two columns
                    "orderable": true // Ensure ordering is enabled for the last two columns
                }
            ]
        });

        $('#resultTable').on('order.dt', function() {
            var order = $('#resultTable').DataTable().order();
            var orderColumnIndex = order[0][0];
            var orderDirection = order[0][1];

            var url = new URL(window.location.href);
            url.searchParams.set('orderColumnIndex', orderColumnIndex);
            url.searchParams.set('orderDirection', orderDirection);

            window.location.href = url.toString();
        });
    });
    </script>
    <script>
        $(document).ready(function() {
            // $('.answerTxt').hide();
            $('.option-field').hide();
            var decimalDiv = `
        <div class="row option-row">
            <div class="col-md-6 mb-2">
                <label for="option" class="form-label">Range 1</label>
                <input type="text" class="form-control" name="options[]">
            </div>
            <div class="col-md-6 mb-2">
                <label for="option" class="form-label">Range 2</label>
                <input type="text" class="form-control" name="options[]">
            </div>           
        </div>
        `;
            $('.decimalDiv').html(decimalDiv);
            $('#typeSelect').change(function() {
                if ($(this).val() == 'Option') {
                    $('.option-field').show();
                    // $('.answerTxt').show();
                    $('.option-field input').attr('required', 'required');
                    $('.decimalDiv').html('');
                } else {
                    $('.option-field').hide();
                    // $('.answerTxt').hide();
                    var decimalDiv = '';
                    var decimalDiv = `
        <div class="row option-row">
            <div class="col-md-6 mb-2">
                <label for="option" class="form-label">Range1</label>
                <input type="text" class="form-control" name="options[]">
            </div>
            <div class="col-md-6 mb-2">
                <label for="option" class="form-label">Range2</label>
                <input type="text" class="form-control" name="options[]">
            </div>           
        </div>
        `;
                    $('.decimalDiv').html(decimalDiv);
                }
            });

            $('#add-option-button').click(function() {
                var currentOptionCount = $('#option-fields-container .row').length * 2; // Each row contains 2 options

                var newOptionNumber1 = currentOptionCount + 1;
                var newOptionNumber2 = currentOptionCount + 2;

                var newOptionHtml = `
        <div class="row option-row">
            <div class="col-md-5 mb-2">
                <label for="option` + newOptionNumber1 + `" class="form-label">Option ` + newOptionNumber1 + `</label>
                <input type="text" class="form-control" name="options[]">
            </div>
            <div class="col-md-5 mb-2">
                <label for="option` + newOptionNumber2 + `" class="form-label">Option ` + newOptionNumber2 + `</label>
                <input type="text" class="form-control" name="options[]">
            </div>
            <div class="col-md-2 mb-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-option-button">Delete</button>
            </div>
        </div>
        `;
                $('#option-fields-container').append(newOptionHtml);
            });

            $('#option-fields-container').on('click', '.remove-option-button', function() {
                $(this).closest('.row').remove();
            });
        });
        $(document).ready(function() {

            $(document).on('change', '.typeSelectEdit', function() {
                var id = $(this).data('id');

                if ($(this).val() == 'Option') {
                    $('.option-field').show();
                    // $('.answerTxtEdit'+id).show();                   

                } else {
                    $('.option-field').hide();
                    // $('.answerTxtEdit'+id).hide();

                }
            });
        });
    </script>

    @endsection
</body>

</html>