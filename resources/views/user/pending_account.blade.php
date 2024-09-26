@extends('layouts.master')
@php
$perPage = request()->query('perPage', 10);

if (Auth::check() && Auth::user()->role_type == 'superadmin'){
$admin = true;
} else {
$admin = false;
}

@endphp
<!DOCTYPE html>
<html lang="en">
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

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

        .toggle span {
            position: relative !important;
        }

        .toggle span:before,
        .toggle span:after {
            display: none !important;
        }

        .toggle span:before,
        .toggle span:before {
            display: none !important;
        }

        .toggle-group {
            top: -2.65px !important;
        }

        table th {
            font-weight: 500 !important;
            color: var(--default-text-color) !important;
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
        <h1 class="page-title">Pending Accounts</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);" style="text-decoration: none;">{{ucwords($auth->role_type)}}</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="padding-left: 0px;">Pending Accounts</li>
            </ol>
        </div>
    </div>
             <form method="GET" action="{{ route('user.pending-accounts') }}">
                        <div class="row mb-3">
                            <div class="col">              
                                <input type="text" value="{{\Request::get('dateRange')}}" id="dateRange" name="dateRange" class="form-control" placeholder="Select date range">
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
                'search' => request('search')
            ]);
        @endphp

  <a href="{{ route('pending-account-export-csv') . '?' . $query }}" class="btn btn-primary">Download CSV</a>
        <!-- Flash messages will be displayed here -->
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title mb-0"></h3>
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
                                        <th>Last Name </th>
                                        <th>Email</th>                                       
                                        <th>DOB</th>
                                        <th>Mobile No.</th>
                                        <th>Registration Date</th>
                                        <th>Validate Status</th>
                                        <th>Profile</th>
                                        @if($admin)
                                        <th>Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through Credit Card data and populate the table -->
                                    @foreach($userList as $loopIndex => $user)


                                    <tr>
                                        <td>{{ $loop->iteration + $userList->firstItem() - 1 }}</td>

                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        
                                      
                                        <td>  
                                        {{ date('Y-m-d', strtotime($user->dob)); }}
                                        </td>
                                        <td> {{ $user->country_code }} {{ $user->mobile }}</td>
                                       
                                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d H:i:s') }}</td>
                                        <td>@if($user->is_validate) Completed @else Pending @endif</td>
                                                @php
                                                $defaultImage = asset('build/assets/images/profile-icon.png');
                                                $imagePath = 'profile/' . $user->profile;
                                                
                                                if ($user->profile != '' && file_exists(public_path($imagePath))) {
                                                $image = asset('profile/' . $user->profile);
                                                } else {
                                                $image = $defaultImage;
                                                }
                                                @endphp

                                        <td><img src="{{ $image }}" class="rounded-circle" width="50" height="50"></td>
                                        @if($admin)
                                        <td>

                                            <!-- Delete Button -->
                                            <form id="deleteaccountForm-{{ $user->id }}" action="{{ route('user.delete', $user->id) }}" method="POST" style="display: inline;">
                        <script>
        $(document).ready(function() {
            flatpickr('#dateRange', {
                mode: 'range',
                dateFormat: 'Y-m-d',
            });

        });
    </script>                         @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this User?')">Delete</button>
                                            </form>
                                            <input data-id="{{$user->id}}" type="checkbox" data-toggle="toggle" data-on="Active" data-off="Deactive" id="toggle-two" {{ $user->status ? 'checked' : '' }}>

                                        </td>

                                        @endif
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                          {{ $userList->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTAINER END -->
    @endsection


    <!-- end credit card popup -->
    @section('scripts')
    <!-- INTERNAL APEXCHART JS -->
    <script src="{{ asset('build/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Color Picker JS -->
    <script src="{{ asset('build/assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

    <!-- Checkbox selectall JS -->
    @vite('resources/assets/js/checkbox-selectall.js')

    <!-- INTERNAL INDEX JS -->
    @vite('resources/assets/js/index1.js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var cardNumberInput = document.getElementById('cardNumber');

            cardNumberInput.addEventListener('input', function() {
                // Remove any non-numeric characters from the input
                var cardNumber = cardNumberInput.value.replace(/\D/g, '');

                // Add spaces after every 4 digits
                cardNumber = cardNumber.replace(/(\d{4})(?=\d)/g, '$1 ');

                // Update the input value with the formatted card number
                cardNumberInput.value = cardNumber;
            });

            var expiryDateInput = document.getElementById('expiryDate');

            expiryDateInput.addEventListener('input', function() {
                // Remove any non-numeric characters from the input
                var date = expiryDateInput.value.replace(/\D/g, '');

                // Add "/" after the first 2 digits (MM)
                if (date.length > 2) {
                    date = date.substring(0, 2) + '/' + date.substring(2);
                }

                // Update the input value with the formatted expiry date
                expiryDateInput.value = date;
            });

        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>


    <script>
         $(document).ready(function() {
        var urlParams = new URLSearchParams(window.location.search);
        var orderColumnIndex = urlParams.get('orderColumnIndex') || 1; // Default to the second column (index 1)
        var orderDirection = urlParams.get('orderDirection') || 'asc';

        $('#resultTable').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            // "order": [[orderColumnIndex, orderDirection]],
            "columnDefs": [
                {
                    "targets": [0,8, 9], // The first column (S.no)
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

        $(function() {
            $('#toggle-two').bootstrapToggle({
                on: 'Active',
                off: 'Deactive'
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('change', '#toggle-two', function() {

            let status = $(this).prop('checked') === true ? 1 : 0;
            let userId = $(this).data('id');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('user.update-status') }}",
                data: {
                    'status': status,
                    'user_id': userId
                },
                success: function(data) {
                    //location.reload(true);
                }
            });

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('user.data') }}",
                success: function(data) {
                    location.reload(true);
                }
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