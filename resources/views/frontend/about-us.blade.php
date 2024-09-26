@extends('frontend.layouts.master')

@section('content')
<section class="about-us gradient-custom py-5">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="card shadow-2-strong card-about" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center text-white">{{$data->title}}</h3>

                      {!! $data->description !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="textwork">
            <a href="{{ route('sign-up') }}" class="btn btn-success btn-lg font-bold px-4 py-2 w-72" style="font-size: 1.0rem; text-align:center;">Join Us Now</a>
        </div>
    </div>
</section>

@endsection