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
            border-chttps://houzlet.com/api/getfavorites.php?user_id=578275aolor: green !important;
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

        .btn-primary2 {    $(document).ready(function() {
        $('#resultTable').DataTable({
            "paging": false, // Disable pagination
            "lengthChange": false, // Disable length change
            "searching": false, // Enable searching
            "ordering": true, // Enable ordering
            "columnDefs": [{
                "targets": [-1, -2], // Targets the last two columns
                "orderable": false // Sets the last two columns to be not orderable
            }],
            "order": [], // Default order setting
            "serverSide": true, // Enable server-side processing
            "ajax": {
                "url": "{{ route('participants.index') }}",
                "data": function(d) {
                    // Capture the ordering settings
                    d.orderColumnIndex = d.order[0].column;
                    d.orderDirection = d.order[0].dir;
                }
            }
        });
    });
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

    <!-- PAGE-HEADER -->xofegycuwy@mailinator.com	
    <!-- Button trigger modal -->
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
        <h1 class="page-title">Participants</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);" style="text-decoration: none;">{{ucwords($auth->role_type)}}</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="padding-left: 0px;">Participant</li>
            </ol>
        </div>
    </div>
    <form method="GET" action="{{ route('participants.index') }}">
        <div class="row mb-3">
            <div class="col">              
                <input type="text" value="{{\Request::get('dateRange')}}" id="dateRange" name="dateRange" class="form-control" placeholder="Select date range">
            </div>  
            <div class="col">              
             <select class="form-control" name="competition_id">
                <option value=""> Select Competition</option>
                @foreach ($competitions as  $res)
                <option value="{{$res->id}}" @if(\Request::get('competition_id') == $res->id) selected @endif> {{$res->name}}</option>
                @endforeach
              
             </select>

            </div>
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
@php
    $query = http_build_query([
        'dateRange' => request('dateRange'),
        'competition_id' => request('competition_id'),
        'search' => request('search')
    ]);
@endphp
        <a href="{{ route('all-user-export-csv') . '?' . $query }}" class="btn btn-primary">Download CSV</a>
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Mobile</th>
                                        <th>Competition</th>
                                        <!-- <th>Competition Status</th> -->
                                        <th>Used Token</th>
                                        <th>Submission Date</th>
                                   
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

                                        <td>{{ $res->user->first_name }}</td>
                                        <td>{{ $res->user->last_name }}</td>
                                        <td>{{ $res->user->email }}</td>
                                        <td>{{ $res->user->gender }}</td>
                                        <td>{{ $res->user->country_code }} {{ $res->user->mobile }}</td>
                                        
                                        <td>{{ $res->competition->name }}</td>
                                        <!-- <td> @if($res->status) Complete   @else In progress @endif </td> -->
                                        <td>{{ $res->competition->token_no}} / {{ $res->used_token }}</td>
                                        <td>{{ \Carbon\Carbon::parse($res->created_at)->format('Y-m-d H:i:s') }}</td>
                                    
                                        @if($admin)
                                        <td>

                                            <!-- Edit Button -->
                                            <a href="{{ route('participants.show', $res->id) }}" class="btn btn-primary" >
                                                View
                                            </a>
                                            <!-- Delete Button -->
                                            <form action="{{ route('participants.destroy', $res->id) }}" method="Post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this participant?')">Delete</button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                    <div class="modal fade" id="editpujaModal{{ $res->id }}" tabindex="-1" aria-labelledby="editpujaModalLabel{{ $res->id }}" aria-hidden="true">
                                        <div class="modal-dialog dialogue-width modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editpujaModalLabel{{ $res->id }}">Edit Competition
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="editForm{{ $res->id }}" method="POST" action="{{ route('participants.update', $res->id) }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="row">
                                                            <div class="col-md-12 mb-2">
                                                                <label for="package" class="form-label">Title </label>
                                                                <input type="text" class="form-control" id="title" name="title" value="{{$res->title}}" required>
                                                            </div>

                                                            <div class="col-md-6 mb-2">
                                                                <label for="package" class="form-label">Option1 </label>
                                                                <input type="text" class="form-control" id="option1" name="option1" value="{{$res->option1}}" required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label for="package" class="form-label">Option2 </label>
                                                                <input type="text" class="form-control" id="option2" name="option2" value="{{$res->option2}}" required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label for="package" class="form-label">Option3 </label>
                                                                <input type="text" class="form-control" id="option3" name="option3" value="{{$res->option3}}" required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label for="package" class="form-label">Option4 </label>
                                                                <input type="text" class="form-control" id="option4" name="option4" value="{{$res->option4}}" required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label for="package" class="form-label">Competition </label>
                                                                <select class="form-control" name="competition_id">
                                                                    <option value="">Select Competition</option>

                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label for="package" class="form-label">Answer </label>
                                                                <input type="text" class="form-control" id="answer" name="answer" value="{{$res->answer}}" required>
                                                            </div>


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
                    <!--{{ $data->appends(['perPage' => $perPage])->links() }}-->
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
                    "targets": [0, 9], // The first column (S.no)
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
            flatpickr('#dateRange', {
                mode: 'range',
                dateFormat: 'Y-m-d',
            });

        });
    </script>

    @endsection
</body>

</html>