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
    <title>Reffer Log</title>

    @section('styles')


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

        p {
            word-wrap: break-word !important;
            word-break: break-all !important;
            white-space: normal !important;
        }

        .editor-ck {
            padding-right: 37px;
            padding-left: 12px;
        }

        .cke_notification_warning {
            display: none;
        }

        .dataTables_filter {
            display: none;
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
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    @section('content')

</head>

<body>

    <!-- PAGE-HEADER -->
    <!-- Button trigger modal -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">Reffer Log</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);" style="text-decoration: none;">{{ucwords($auth->role_type)}}</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="padding-left: 0px;">Reffer Log</li>
            </ol>
        </div>
    </div>
    <form method="GET" action="{{ route('reffer-log.index') }}">
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

                    <!-- <button style="padding: 10px 20px; margin: 10px;" data-bs-toggle="modal" data-bs-target="#addaccountModal" class="btn btn-primary" id="accountBtn">
                        <i class="fa fa-plus fa-lg" aria-hidden="true"></i> Add Competition
                    </button> -->
                  
                    <br>
                </div>

                <!-- Add Account Modal -->
                <div class="modal fade" id="addaccountModal" tabindex="-1" aria-labelledby="addaccountModalLabel" aria-hidden="true">
                    <div class="modal-dialog dialogue-width modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addaccountModalLabel">Add New Competition</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Add Account Form -->
                                <form id="addaccountForm" method="POST" action="{{ route('competitions.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="package" class="form-label">Name of competition </label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="package" class="form-label">Length of Sprint </label>
                                            <input type="number" class="form-control" id="sprint" name="sprint" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="package" class="form-label">Start Date </label>
                                            <input type="date" class="form-control" id="startdate" name="startdate" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="package" class="form-label">End Date </label>
                                            <input type="date" class="form-control" id="enddate" name="enddate" required>
                                        </div>
                                        <!-- <div class="col-md-6 mb-2">
                                            <label for="package" class="form-label">No of free token </label>
                                            <input type="number" class="form-control" id="token_no" name="token_no" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="package" class="form-label">Expiry date of token </label>
                                            <input type="date" class="form-control" id="token_expiry_date" name="token_expiry_date" required>
                                        </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="package" class="form-label">No of free token </label>
                                            <input type="number" class="form-control" id="token_no" name="token_no" value="" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="package" class="form-label">News Heading </label>
                                            <input type="text" class="form-control" id="news_heading" name="news_heading" value="" required>
                                        </div>
                                    </div>
                                    <div class="row editor-ck">
                                        <label for="package" class="form-label">Summary</label>
                                        <textarea id="editor_summary" name="summary" class="form-control"></textarea>
                                        <!-- <div id="editor_new">
                                        
                                        </div> -->
                                        <!-- <input type="hidden" id="rule_of_competition" name="rule_of_competition"> -->
                                    </div>
                                    <div class="row editor-ck">
                                        <label for="package" class="form-label">Rule of competition </label>
                                        <textarea id="editor_new" name="rule_of_competition" class="form-control"></textarea>
                                        <!-- <div id="editor_new">
                                        
                                        </div> -->
                                        <!-- <input type="hidden" id="rule_of_competition" name="rule_of_competition"> -->
                                    </div>



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
                    <h3 class="card-title mb-0"> </h3>
                </div>


                <div class="card-body pt-4">
                    <div class="grid-margin">
                        <div class="table-responsive">
                            <!-- Credit Card List Table -->
                            <table class="table" id="resultTable">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Reffer Email</th>
                                        <th>Subject</th>
                                        <th>Reffer Date</th>
                                        <th>Account Creation</th>
                                        <th>Participant Date</th>
                                     
                                        @if($admin)
                                        <th>Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through Credit Card data and populate the table -->

                                    @foreach($data as $loopIndex => $res)
                                

                                    <tr>
                                        <td>{{ $loop->iteration + $data->firstItem() - 1 }}</td>
                                        <td>{{ $res->name }} </td>
                                        <td>{{ $res->email }}</td>
                                        <td>{{ $res->reffer_email }}</td>
                                        <td>{{ $res->subject }}</td>
                                        <td>{{ date('Y-m-d H:i:s', strtotime($res->created_at)) }}</td>
                                        <td>   
                                           @if(isset($res->user->status) && $res->user->status )
                                        {{ date('Y-m-d H:i:s', strtotime($res->user->created_at)) }}
                                        @else
                                        N/A
                                        @endif
                                        </td>
                                        <td> 
                                        @if(isset($res->user->status) && $res->user->status && $res->user->is_validate)
                                        {{ date('Y-m-d H:i:s', strtotime($res->user->updated_at)) }}
                                        @else
                                        N/A
                                        @endif </td>
                                      
                                     
                                    

                                        @if($admin)
                                        <td>
                                            <!-- Edit Button -->

                                          
                                        
                                                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editpujaModal{{ $res->id }}">
                                            Edit
                                            </button> -->
                                                <!-- <a href="{{route('reffer-log.show',$res->id)}}" class="btn btn-primary">
                                                    Edit
                                                </a> -->
                                               
                                              

                                                <!-- Delete Button -->
                                                <form action="{{ route('reffer-log.destroy', $res->id) }}" method="Post" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this reffer log?')">Delete</button>
                                                </form>
                                        </td>
                                        @endif
                                    </tr>

                                    <div class="modal fade" id="editpujaModal{{ $res->id }}" tabindex="-1" aria-labelledby="editpujaModalLabel{{ $res->id }}" aria-hidden="true">
                                        <div class="modal-dialog dialogue-width modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editpujaModalLabel{{ $res->id }}">Edit Competition</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="editForm{{ $res->id }}" method="POST" action="{{ route('reffer-log.update', $res->id) }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="row">
                                                            <div class="col-md-6 mb-2">
                                                                <label for="name{{ $res->id }}" class="form-label">Name of competition</label>
                                                                <input type="text" class="form-control" id="name{{ $res->id }}" name="name" value="{{ $res->name }}" required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label for="sprint{{ $res->id }}" class="form-label">Length of Sprint</label>
                                                                <input type="number" class="form-control" id="sprint{{ $res->id }}" name="sprint" value="{{ $res->sprint }}" required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label for="startdate{{ $res->id }}" class="form-label">Start Date</label>
                                                                <input type="date" class="form-control" id="startdate{{ $res->id }}" name="startdate" value="{{ $res->startdate }}" required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label for="enddate{{ $res->id }}" class="form-label">End Date</label>
                                                                <input type="date" class="form-control" id="enddate{{ $res->id }}" name="enddate" value="{{ $res->enddate }}" required>
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <label for="token_no{{ $res->id }}" class="form-label">No of free token</label>
                                                                <input type="number" class="form-control" id="token_no{{ $res->id }}" name="token_no" value="{{ $res->token_no }}" required>
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <label for="token_no{{ $res->id }}" class="form-label">News Heading</label>
                                                                <input type="text" class="form-control" id="news_heading{{ $res->id }}" name="news_heading" value="{{ $res->news_heading }}" required>
                                                            </div>
                                                        </div>

                                                        <div class="row editor-ck ">
                                                            <label for="summary{{ $res->id }}" class="form-label">Summary</label>
                                                            <textarea id="summary{{ $res->id }}" name="summary" class="form-control">{!! $res->summary !!}</textarea>
                                                        </div>
                                                        <div class="row editor-ck ">
                                                            <label for="editor{{ $res->id }}" class="form-label">Rule of competition</label>
                                                            <textarea id="editor{{ $res->id }}" name="rule_of_competition" class="form-control">{!! $res->rule_of_competition !!}</textarea>
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


    <!-- Internal Quill JS -->
    <!-- @vite('resources/assets/js/quill-editor.js') -->
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
                // "order": [
                //     [orderColumnIndex, orderDirection]
                // ],
                "columnDefs": [{
                        "targets": [0, 8], // The first column (S.no)
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
        CKEDITOR.replace('#editor_new');
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize CKEditor for all textareas with ids starting with "editor"
            document.querySelectorAll('textarea[id^="summary"]').forEach(function(textarea) {
                CKEDITOR.replace(textarea.id);
            });

            // Update hidden input before form submission
            document.querySelectorAll('form[id^="editForm"]').forEach(function(form) {
                form.addEventListener('submit', function() {
                    const editorId = form.querySelector('textarea[id^="summary"]').id;
                    const editorContent = CKEDITOR.instances[editorId].getData();
                    form.querySelector('input[name="rule_of_competition"]').value = editorContent;
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize CKEditor for all textareas with ids starting with "editor"
            document.querySelectorAll('textarea[id^="editor"]').forEach(function(textarea) {
                CKEDITOR.replace(textarea.id);
            });

            // Update hidden input before form submission
            document.querySelectorAll('form[id^="editForm"]').forEach(function(form) {
                form.addEventListener('submit', function() {
                    const editorId = form.querySelector('textarea[id^="editor"]').id;
                    const editorContent = CKEDITOR.instances[editorId].getData();
                    form.querySelector('input[name="rule_of_competition"]').value = editorContent;
                });
            });
        });
    </script>
    @endsection
</body>

</html>