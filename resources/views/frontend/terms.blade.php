@extends('frontend.layouts.master')

@section('content')
<section class="about-us gradient-custom py-5 body-bg-img ">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="card shadow-2-strong card-about" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center text-white">Terms of Service</h3>

                        <h3 class="mb-3 text-white">1. Use of the Site</h3>
                        <p class="text-white">You agree to use the Site only for lawful purposes and in accordance with these Terms. You must not use the Site in any way that violates any applicable federal, state, local, or international law or regulation.</p>

                        <h3 class="mb-3 text-white">2. User Account</h3>
                        <p class="text-white">In order to access certain features of the Site, you may be required to create an account. You are responsible for maintaining the confidentiality of your account and password and for restricting access to your account. You agree to accept responsibility for all activities that occur under your account.</p>

                        <h3 class="mb-3 text-white">3. Content</h3>
                        <p class="text-white">The Site may allow you to post, link, store, share, and otherwise make available certain information, text, graphics, videos, or other material ("Content"). You are responsible for the Content that you post on or through the Site, including its legality, reliability, and appropriateness.</p>

                        <h3 class="mb-3 text-white">4. Intellectual Property</h3>
                        <p class="text-white">The Site and its original content, features, and functionality are owned by the Stock Market website and are protected by international copyright, trademark, patent, trade secret, and other intellectual property or proprietary rights laws.</p>

                        <h3 class="mb-3 text-white">5. Disclaimer</h3>
                        <p class="text-white">The Site and its content are provided on an "as is" and "as available" basis. We do not warrant that the Site will be uninterrupted, secure, or error-free. We reserve the right to modify, suspend, or discontinue any part of the Site at any time without notice.</p>

                        <h3 class="mb-3 text-white">6. Governing Law</h3>
                        <p class="text-white">These Terms shall be governed by and construed in accordance with the laws of [Your Jurisdiction], without regard to its conflict of law provisions.</p>

                        <p class="text-white">For the complete Terms of Service, please refer to the Stock Market website.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="{{ route('sign-up') }}" class="btn btn-success btn-lg font-bold px-4 py-2 mt-5" style="font-size: 1.0rem;">Join Us Now</a>
        </div>
    </div>
</section>

@endsection
