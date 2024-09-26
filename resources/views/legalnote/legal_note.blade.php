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
    <title>Legal Note</title>

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
        <h1 class="page-title">Legal Note</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);" style="text-decoration: none;">{{ucwords($auth->role_type)}}</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="padding-left: 0px;">Legal Note</li>
            </ol>
        </div>
    </div>

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
                @if($data->isEmpty())
                    <button style="padding: 10px 20px; margin: 10px;" data-bs-toggle="modal" data-bs-target="#addaccountModal" class="btn btn-primary" id="accountBtn">
                        <i class="fa fa-plus fa-lg" aria-hidden="true"></i> Add Legal Note
                    </button>
                </div>
                @endif

                <!-- Add Account Modal -->
                <div class="modal fade" id="addaccountModal" tabindex="-1" aria-labelledby="addaccountModalLabel" aria-hidden="true">
                    <div class="modal-dialog dialogue-width modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addaccountModalLabel">Add New Legal Note</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Add Account Form -->
                                <form id="addaccountForm" method="POST" action="{{ route('legal-note.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="package" class="form-label">Title </label>
                                            <input type="text" class="form-control" id="title" name="title" required>
                                        </div>
                                       
                                    </div>
                                   
                                    <div class="row editor-ck">
                                        <label for="package" class="form-label">Description</label>
                                        <textarea id="editor_summary" name="description" class="form-control"></textarea>
                                        <!-- <div id="editor_new">
                                        
                                        </div> -->
                                        <!-- <input type="hidden" id="rule_of_Legal Note" name="rule_of_Legal Note"> -->
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
                    <h3 class="card-title mb-0"> Legal Note List</h3>
                </div>


                <div class="card-body pt-4">
                    <div class="grid-margin">
                        <div class="table-responsive">
                            <!-- Credit Card List Table -->
                            <table class="table" id="resultTable">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                     
                                        <th>Actions</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through Credit Card data and populate the table -->
                                    @foreach($data as $loopIndex => $res)
                                    <tr>
                                        <td>{{ $loop->iteration + $data->firstItem() - 1 }}</td>
                                        <td>  <p class="content-description">{{ $res->title }} </p></td>
                                        
                                        <td>  <p class="content-description">{!! $res->description!!} </p></td>

                                       
                                        <td>
                                            <!-- Edit Button -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editpujaModal{{ $res->id }}">
                                                Edit
                                            </button>
                                            <!-- Delete Button -->
                                            @if($data->isEmpty())
                                            <form action="{{ route('legal-note.destroy', $res->id) }}" method="Post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Legal Note?')">Delete</button>
                                            </form>
                                            @endif
                                        </td>
                                       
                                    </tr>

                                    <div class="modal fade" id="editpujaModal{{ $res->id }}" tabindex="-1" aria-labelledby="editpujaModalLabel{{ $res->id }}" aria-hidden="true">
                                        <div class="modal-dialog dialogue-width modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editpujaModalLabel{{ $res->id }}">Edit Legal Note</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="editForm{{ $res->id }}" method="POST" action="{{ route('legal-note.update', $res->id) }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="row">
                                                            <div class="col-md-12 mb-2">
                                                                <label for="name{{ $res->id }}" class="form-label">Title</label>
                                                                <input type="text" class="form-control" id="title{{ $res->id }}" name="title" value="{{ $res->title }}" required>
                                                            </div>
                                                         
                                                        </div>
                                                        
                                                        <div class="row editor-ck ">
                                                            <label for="summary{{ $res->id }}" class="form-label">description</label>
                                                            <textarea id="summary{{ $res->id }}" name="description" class="form-control">{!! $res->description !!}</textarea>
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
            $('#resultTable').DataTable({
                // "lengthMenu": [10, 25, 50, 100],
                // "pageLength": 10, // Default page length
                "lengthChange": false,
                "searching": true,
                "columnDefs": [{
                    "targets": [-1, -2], // Targets the last two columns
                    "orderable": false // Sets the last two columns to be not orderable
                }]

            });
        });
    </script>
   
    <script>
  CKEDITOR.replace( 'editor_new' );
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
                    form.querySelector('input[name="rule_of_Legal Note"]').value = editorContent;
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
                    form.querySelector('input[name="rule_of_Legal Note"]').value = editorContent;
                });
            });
        });
    </script>
    @endsection
</body>

</html>