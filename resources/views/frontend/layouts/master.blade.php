<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="title icon" type="image/png" href="images/title-img.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/latest.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript">
       function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'fr,es,pt,de,uk',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }

        function translatePageToFrench() {
            var googleTranslateScript = document.createElement('script');
            googleTranslateScript.src = 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
            document.head.appendChild(googleTranslateScript);

            googleTranslateScript.onload = function() {
                setTimeout(function() {
                    // Ensure translate="no" is set
                    var noTranslateElements = document.querySelectorAll('[data-no-translate]');
                    noTranslateElements.forEach(function(element) {
                        element.setAttribute('translate', 'no');
                    });
                }, 1000); // Adjust this timeout if necessary
            };
        }

        document.addEventListener('DOMContentLoaded', function() {
            translatePageToFrench();
        });
    </script>
    
    <style>
    #goog-gt-tt{
        display:none!important;
    }
        .navbar-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .date_time {
            color: #fff!important;
            font-weight: 600;
            

        }

        /* .navbar-center.mx-auto {
            margin-top: 57px;
            position: fixed;
        } */

        .navbar .date_time {
            white-space: nowrap;
            text-align: center;
            padding-top: 20px;
            margin-left: 12px;
        }

        @media (min-width: 992px) {
            .date-wrapper {
                flex-grow: 1;
                display: flex;
                justify-content: center;
            }
        }

        .header-logo {
            max-width: 210px;
            /* Adjusted size */
            height: auto;
        }

        .header-user .btn-link {
            color: inherit;
            text-decoration: none;
        }

        .header-user .logout {
            color: inherit;
            text-decoration: none;
        }

        .email-icon {
            font-size: 1.25rem;
            margin-right: 0.5rem;
        }

        .date_time {
            font-size: 0.875rem;
             color:#fff !important;
        }

        @media (max-width: 767px) {
            .navbar-nav {
                flex-direction: column;
                align-items: center;
            }

            .header-user {
                display: flex;
                align-items: center;
                margin-top: 0.5rem;
            }

            .date_time {
                text-align: center;
                width: 100%;
                 color:#fff !important;
            }
        }
            
    </style>
</head>

<body >
<div id="google_translate_element" ></div>

    <!-- header -->
    <!-- <div class="header-container">
        <div class="header-inner">
            <div class="header-content">
                <div class="header-logo">
                    <img src="{{asset('assets/images/stock-logo.png')}}" class="h-16 w-64" alt="">
                </div>
                <div class="header-right">
                    <i class="fa-regular fa-envelope email-icon"></i>
                    <p>hello wio</p>
                    <div class="header-user">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVooGrfYQ5XopJLFPvqKnlY-51cV0cquQJPSrUPbF-ZQ&s" class="h-5 w-5 rounded-full" alt="">
                        <button>@if(Auth::check()){{Auth::user()->first_name }} {{Auth::user()->last_name }}@endif</button>
                        @if(Auth::check()) <a href="{{route('user-logout')}}" class="logout">Logout</a>@endif
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #003399;">
        <div class="container d-flex align-items-center">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/stock-logo.png') }}" class="header-logo" alt="Logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="@if(Auth::check()){{ route('competition', LatestCompetitionId() ) }} @else {{ route('sign-up') }}@endif">Competition</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rules.index') }}">Rules of the competition</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://fr.finance.yahoo.com/?guccounter=1&guce_referrer=aHR0cHM6Ly93d3cuZ29vZ2xlLmNvbS8&guce_referrer_sig=AQAAACpxPJScpNSNOVVv3edjwtZ0q7h5ByRaSEop-zBSAW8iuLwVkEOUHHS1szPZ6_ibuvfIq27ABL_sqSz7fA2RvgZWsnHV1PkAK_zwC1qkqh4hNG88WBwYPfY3tLOv3ki9_O9dEt-hv-QeL-31UKfByWk7vA1Qiq-5hkEw0F1-nIkx">Financial news </a>
                    </li>
                </ul>
                <!-- User Information Section -->
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <i class="fa-regular fa-envelope email-icon"></i>
                    </li>
                    <li class="nav-item">
                        <div class="header-user d-flex align-items-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVooGrfYQ5XopJLFPvqKnlY-51cV0cquQJPSrUPbF-ZQ&s" class="h-5 w-5 rounded-circle me-2" alt="User Image">
                            <button class="btn btn-link p-0">
                                @if(Auth::check()) {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} @endif
                            </button>
                            @if(Auth::check())
                            <a href="{{ route('user-logout') }}" class="logout ms-2">Logout</a>
                            @else
                            <a href="{{ route('sign-in') }}" class="logout ms-2">Login</a>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                      <a class="nav-link"><span translate="no">{{ date("Y-m-d H:i:s") }} UTC<span></span></a>
                       
                    </li>
                </ul>
            </div>
        </div>

        <!-- Center-aligned Date and Time Display for Mobile and Tablets -->
        <div class="d-lg-none text-center mt-2 w-100">
       <label class="date_time" id="headerDateTime"><span translate="no">{{ date("Y-m-d H:i:s") }} UTC</span></label>
          
        </div>
    </nav>

    @yield('content')
    <!-- <div class="date_time">
        {{ date("Y-m-d H:i:s") }}
    </div> -->
    <!-- Body content -->
    <!-- 
    <ul class="navbar-nav">
        <li class="nav-item">
            <p class="navbar-text">Hello, wio</p>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user-logout') }}">Logout</a>
        </li>
    </ul> -->

    @if (isset($showCookieConsent) && $showCookieConsent)
    @include('frontend.dialogContents')
    @endif
    <!-- End body content -->

    <footer class="text-center text-lg-start text-white" style="background-color: #003399;">
        <!--<div class="navbar-center">-->
        <!--    <label class="date_time" id="headerDateTime"> {{ date("Y-m-d H:i:s") }}</label>-->
        <!--</div>-->
        <section class="">

            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->

                        <div class="footer-logo">
                            <a href="{{route('how-it-work')}}"><img src="{{asset('assets/images/stock-logo.png')}}" class="h-24 w-80 responsive" alt=""></a>
                        </div>
                        <!-- <a href="http://127.0.0.1:8000/"><img src="{{asset('assets/images/stock-logo.png')}}" class="img-fluid" alt="Company Logo"></a> -->
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <!--<p>-->
                        <!--    Our website uses cookies to provide your browsing experience. Before continuing to use our website, you agree & accept of our Privacy Policy. Otherwise leave this website.-->
                        <!--</p>-->
                        @if(Auth::check())


                        <form action="{{ route('send.email') }}" method="POST">
                            @csrf
                            <p>Reffer your friend </p>
                            <div class="input-container">

                                <input type="email" name="email" class="form-control" placeholder="Type your friend email..." aria-label="Email input" required>
                                <button type="submit" class="send-icon" aria-label="Send email">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-send-fill" viewBox="0 0 16 16">
                                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                        @endif
                    </div>
                    <!-- Grid column -->

                    <!--<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">-->
                        <!-- Links -->
                    <!--    <h6 class="text-uppercase fw-bold">Products</h6>-->
                    <!--    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />-->
                    <!--    <p>-->
                    <!--        <a href="#!" class="text-white text-decoration-none">MDBootstrap</a>-->
                    <!--    </p>-->
                    <!--    <p>-->
                    <!--        <a href="#!" class="text-white text-decoration-none">MDWordPress</a>-->
                    <!--    </p>-->
                    <!--    <p>-->
                    <!--        <a href="#!" class="text-white text-decoration-none">BrandFlow</a>-->
                    <!--    </p>-->
                    <!--    <p>-->
                    <!--        <a href="#!" class="text-white text-decoration-none">Bootstrap Angular</a>-->
                    <!--    </p>-->
                    <!--</div>-->
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!--<h6 class="text-uppercase fw-bold">Legal</h6>-->
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <!--<p>-->
                        <!--    <a href="{{ route('terms') }}" class="text-white text-decoration-none">Terms of Service</a>-->
                        <!--</p>-->
                        <!--<p>-->
                        <!--    <a href="{{ route('privacy') }}" class="text-white text-decoration-none">Privacy Policy</a>-->
                        <!--</p>-->
                        <!--<p>-->
                        <!--    <a href="{{ route('cookie') }}" class="text-white text-decoration-none">Cookie Policy</a>-->
                        <!--</p>-->
                        <p>
                            <a href="{{ route('legal-note') }}" class="text-white text-decoration-none">Legal Note & Partnership</a>
                        </p>
                    </div>
                    <!-- Grid column -->
                    <!--<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">-->

                    <!--    <h6 class="text-uppercase fw-bold">Contact</h6>-->
                    <!--    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />-->
                    <!--    <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>-->
                    <!--    <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>-->
                    <!--    <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>-->
                    <!--    <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>-->
                    <!--</div>-->
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-3">
            © 2024 Copyright: Boursecash, Profitez De La Bourse Maintenant.
            <!-- <a class="text-white" href="https://mdbootstrap.com/"></a> -->
        </div>
        <!-- Copyright -->
    </footer>
    <!-- end of footer -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var currentPath = window.location.href;
            var navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(function(link) {
                var linkPath = link.href;
                console.log('Comparing', linkPath, 'with', currentPath);
                if (linkPath === currentPath) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>

</html>