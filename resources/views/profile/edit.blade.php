@extends('layouts.custom-master1')

@section('styles')



@endsection

@section('content')

<!-- CONTAINER OPEN -->
<div class="">
    <div class="text-center">
        <!-- <a href="{{url('index')}}"><img src="{{asset('build/assets/images/brand/desktop-dark.png')}}" class="header-brand-img m-0" alt=""></a> -->
    </div>
</div>

<!-- Display Validation Errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-lg">
    <div class="row mt-4 justify-content-center mx-0">
        <div class="col-xl-4 col-lg-6">
            <div class="card shadow-none">
                <div class="card-body p-sm-6">
                    <div class="text-center mb-4">
                        <div style="display: flex; justify-content: left;">
                            <!-- <a href="javascript:history.back()">
                                <i style='font-size:24px' class='fas'>&#xf060;</i>
                            </a> -->
                            
                        </div>
                        <h4 class="mb-1">Update Profile</h4>
                    </div>
                    <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="mb-2 fw-500">First Name<span class="text-danger ms-1">*</span></label>
                                    <input class="form-control ms-0" type="text" placeholder="Enter First Name" name="first_name" required autofocus value="{{ $user->first_name }}" >
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="mb-2 fw-500">Last Name<span class="text-danger ms-1">*</span></label>
                                    <input class="form-control ms-0" type="text" placeholder="Enter last Name" name="last_name" required autofocus value="{{ $user->last_name }}" >
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="mb-2 fw-500">Mobile No.<span class="text-danger ms-1">*</span></label>
                                    <input class="form-control ms-0" type="number" placeholder="Enter Mobile No" name="mobile" required autofocus value="{{ $user->mobile }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="mb-2 fw-500">Dob<span class="text-danger ms-1">*</span></label>
                                    @php
            // Format the date from database
            $formattedDate = date('Y-m-d', strtotime($user->dob));
        @endphp
        <input class="form-control ms-0" type="date" placeholder="Enter DOB" name="dob" required autofocus value="{{ $formattedDate }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="mb-2 fw-500">Gender<span class="text-danger ms-1">*</span></label>
                                    <select class="form-control ms-0" name ="gender" id="gender" required autofocus>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="mb-2 fw-500">Email<span class="text-danger ms-1">*</span></label>
                                    <input class="form-control ms-0" type="email" placeholder="Enter your Email" name="email" value="{{ $user->email }}"  pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required autofocus>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                <label class="mb-2 fw-500">Image<span class="text-danger ms-1">*</span></label>
                                <br>
                                <img src="{{ asset('profile/' . Auth::user()->profile) }}" class="rounded-circle" width="80" height="80" style="margin-top: 10px;">
                                            <input type="file" class="form-control" name="profile" id="imageFilename" value="{{ $user->profile }}">
                                </div>
                            </div>
                         
                            <div class="col-xl-12">
                                <!-- <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label tx-15" for="flexCheckChecked">
                                        Remember me
                                    </label>
                                </div> -->

                                <div class="d-grid mb-3">
                                    <!-- <a href="{{url('postRegistration')}}" class="btn btn-primary"> Create an Account</a> -->
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                    </form>
                    
                </div>
            </div>
            <!-- <p class="text-center mt-3 mb-2">Signup with</p>
            <div class="d-flex justify-content-center">
                <div class="btn-list">
                    <button class="btn btn-icon bg-primary-transparent rounded-pill border-0" type="button">
                        <span class="btn-inner--icon"><i class="fa fa-facebook"></i></span>
                    </button>
                    <button class="btn btn-icon bg-primary-transparent rounded-pill border-0" type="button">
                        <span class="btn-inner--icon"><i class="fa fa-google"></i></span>
                    </button>
                    <button class="btn btn-icon bg-primary-transparent rounded-pill border-0" type="button">
                        <span class="btn-inner--icon"><i class="fa fa-twitter"></i></span>
                    </button>
                    <button class="btn btn-icon bg-primary-transparent rounded-pill border-0" type="button">
                        <span class="btn-inner--icon"><i class="fa fa-linkedin"></i></span>
                    </button>
                </div>
            </div> -->
        </div>
    </div>
</div>
<div class="col-xl-9 d-none"></div>
</div>
</div>
<!-- CONTAINER CLOSED -->

@endsection

@section('scripts')

<!-- Show Password JS -->
<script src="{{asset('build/assets/show-password.js')}}"></script>

@endsection