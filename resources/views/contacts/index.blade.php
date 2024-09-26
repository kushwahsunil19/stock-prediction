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
    <title>Contact Us</title>

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
        <h1 class="page-title">Contacts</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);" style="text-decoration: none;">{{ucwords($auth->role_type)}}</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="padding-left: 0px;">Contacts</li>
            </ol>
        </div>
    </div>
    
  <form method="GET" action="{{ route('contactus.index') }}">
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
    <!-- CONTAINER -->Contact
    <div class="main-container container-fluid">
        <!-- Start::Row-1 -->

        <!-- Flash messages will be displayed here -->
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                @if($admin)
                <div>

                    <!-- <button style="padding: 10px 20px; margin: 10px;" data-bs-toggle="modal" data-bs-target="#addaccountModal" class="btn btn-primary" id="accountBtn">
                        <i class="fa fa-plus fa-lg" aria-hidden="true"></i> Add Question
                    </button> -->
                </div>

                <!-- Add Account Modal -->
             
                @endif
                <div class="card-header">
                    <h3 class="card-title mb-0"> Contact List</h3>
                </div>


                <div class="card-body pt-4">
                    <div class="grid-margin">
                        <div class="table-responsive">
                            <!-- Credit Card List Table -->
                            <table class="table" id="resultTable">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through Credit Card data and populate the table -->
                                    @foreach($data as $loopIndex => $res)
                                    <tr>
                                        <td>{{ $loop->iteration + $data->firstItem() - 1 }}</td>
                                        <td>{{ $res->name }}</td>
                                        <td>{{ $res->email }}</td>
                                        <td>{{ $res->contact }}</td>
                                        <td>{{ $res->subject }}</td>                                       
                                        <td>{{ $res->message }}</td>
                                      
                                        <td>
                                        
                                            <form action="{{ route('contactus.destroy', $res->id) }}" method="Post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                                            </form>
                                        </td>
                                    
                                    </tr>
                                   
                        </div>
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

    <script>
        $(document).ready(function() {
            $('#resultTable').DataTable({
                // "lengthMenu": [10, 25, 50, 100],
                // "pageLength": 10, // Default page length
                "lengthChange": false,
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