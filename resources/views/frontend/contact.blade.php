@extends('frontend.layouts.master')
@section('content')

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<section class="contact gradient-custom py-5 bg-blue-300 middle-content body-bg-img ">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong card-contact" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center bg-white">Contact Us</h3>

                        {{-- Display success or error messages --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        {{-- Contact form --}}
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" id="InputName" name="name" class="form-control form-control-lg" placeholder="Name" />
                                <label class="form-label" for="InputName">Name</label>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" id="InputEmail" name="email" class="form-control form-control-lg" placeholder="Email" />
                                <label class="form-label" for="InputEmail">Email</label>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" id="InputContact" name="contact" class="form-control form-control-lg" placeholder="Contact" />
                                <label class="form-label" for="InputContact">Contact</label>
                                @if ($errors->has('contact'))
                                    <span class="text-danger">{{ $errors->first('contact') }}</span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" id="InputSubject" name="subject" class="form-control form-control-lg" placeholder="Subject" />
                                <label class="form-label" for="InputSubject">Subject</label>
                                @if ($errors->has('subject'))
                                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="InputMessage" name="message" style="height: 100px" placeholder="Message"></textarea>
                                <label for="InputMessage">Message</label>
                                @if ($errors->has('message'))
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                @endif
                            </div>

                            <!-- {{-- reCAPTCHA widget --}}
                            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                            @endif
                            <div> -->
     
                         <div class="form-floating mb-3">

                                <input type="text" id="InputSubject" name="captcha" class="form-control form-control-lg" placeholder="Enter the code" />
                                <label class="form-label" for="InputSubject">Enter the captcha code</label>
                                <br>
                                <img src="{{ route('captcha.generate') }}" alt="CAPTCHA">
                                @if ($errors->has('subject'))
                                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                                @endif
                            </div>
                            <div class="mt-4 pt-2 text-center">
                                <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
