<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', optional($setting)->title ?? 'Our College')</title>
    
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fa_6_7_2_all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/rsmenu-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/rsmenu-transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="shortcut icon" href="{{ optional($setting)->favicon ? asset('uploads/settings/' . $setting->favicon) : asset('frontend/images/favicon.png') }}">
</head>
<body>

<!-- Full width header Start -->
<div class="full-width-header">
    <!-- Toolbar Start -->
    <div class="rs-toolbar">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12" style="align-content: center;">
                    <div class="rs-toolbar-left">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fas fa-envelope"></i>
                                    <span class="ml-2">{{ optional($setting)->email ?? 'info@example.com' }}</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fas fa-phone"></i>
                                    <span class="ml-2">{{ optional($setting)->phone ?? '+1234567890' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Scrolling Notices -->
                <div class="col-md-5 col-12">
                    <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseleave="this.start();">
                        @foreach($notices->take(5) as $notice)
                            <a href="{{ asset('uploads/notices/' . $notice->file) }}" target="_blank" class="text-light mx-3">
                                {{ Str::limit($notice->title, 50) }}
                            </a> &nbsp;&nbsp;&nbsp;
                        @endforeach
                    </marquee>
                </div>

                <div class="col-md-3 d-none d-md-block">
                    <div class="rs-toolbar-right">
                        <div class="toolbar-share-icon">
                            <ul>
                                <li><a href="{{ $setting->facebook ?? '#' }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $setting->twitter ?? '#' }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $setting->youtube ?? '#' }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="{{ $setting->linkedin ?? '#' }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Toolbar End -->
        
        <nav>
        <a href="{{ route('home') }}" class="logo">
            <img
                src="{{ optional($setting)->logo ? asset('uploads/settings/' . $setting->logo) : asset('assets/img/logo.png') }}" />
        </a>
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn">
            <span class="nav-icon"></span>
        </label>
        <ul class="menu" style="border-radius: 5px;">
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('notice') }}">Notice Board</a></li>
            <li><a href="{{ route('home') }}#courses">Courses</a></li>
            <li><a href="{{ route('home') }}#contact">Contact</a></li>
            @auth
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            @else
                <li>
                    <a class="active" href="{{ route('login') }}" style="width:auto; border-radius: 5px; cursor: pointer;">Login</a>
                </li>
            @endauth
        </ul>
    </nav>
    <!-- Header End -->
</div>
<!-- Full width header End -->

<main>
    @yield('content')
</main>

<!-- Footer Start -->
<footer id="rs-footer" class="bg3 rs-footer">
    <div class="container">
        <!-- Footer Address -->
        <div>
            <div class="row footer-contact-desc">
                <div class="col-md-4">
                    <div class="contact-inner">
                        <a href="{{ url('contact') }}">
                            <i class="fas fa-map-marker-alt"></i>
                            <h4 class="contact-title">Address</h4>
                            <p class="contact-desc text-center">
                                {{ optional($setting)->address ?? 'College Road, City, Country' }}
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-inner">
                        <i class="fas fa-phone"></i>
                        <h4 class="contact-title">Phone Number</h4>
                        <p class="contact-desc">
                            {{ optional($setting)->phone ?? '+880XXXXXXXXXX' }}
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-inner">
                        <i class="fas fa-envelope"></i>
                        <h4 class="contact-title">Email Address</h4>
                        <p class="contact-desc">
                            {{ optional($setting)->email ?? 'info@college.edu' }}
                        </p>
                    </div>
                </div>
            </div>                    
        </div>
    </div>
    
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-12"></div>
                <div class="col-lg-4 col-md-12">
                    <div class="about-widget">
                        <img src="{{ optional($setting)->logo ? asset('uploads/settings/' . $setting->logo) : asset('assets/img/logo.png') }}" 
                             alt="Footer Logo" height="60">
                        <p>{{ optional($setting)->footer_description ?? 'Our college provides quality education with a focus on holistic development and academic excellence.' }}</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-12">
                    <h5 class="footer-title">OUR SITEMAP</h5>
                    <ul class="sitemap-widget">
                        <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                            <a href="{{ url('home') }}"><i class="fas fa-angle-right"></i>Home</a>
                        </li>
                        <li><a href="{{ url('about') }}"><i class="fas fa-angle-right"></i>About</a></li>
                        <li><a href="{{ url('admission') }}"><i class="fas fa-angle-right"></i>Admission Information</a></li>
                        <li><a href="{{ url('news') }}"><i class="fas fa-angle-right"></i>News & Events</a></li>
                        <li><a href="{{ url('results') }}"><i class="fas fa-angle-right"></i>Results</a></li>
                        <li><a href="{{ url('contact') }}"><i class="fas fa-angle-right"></i>Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-12"></div>
            </div>
            <div class="footer-share">
                <ul>  
                    <li><a href="{{ $setting->facebook ?? '#' }}" target="_blank"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="{{ $setting->twitter ?? '#' }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{{ $setting->youtube ?? '#' }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="{{ $setting->linkedin ?? '#' }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>                                
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="copyright">
                <p>&copy; {{ date('Y') }} {{ optional($setting)->title ?? 'Our College' }}. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- JavaScript Libraries -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script>
    // Mobile Menu Toggle
    $(document).ready(function() {
        $('.rs-menu-toggle').click(function() {
            $('.rs-menu').toggleClass('active');
        });
        
        // Close menu when clicking outside
        $(document).click(function(e) {
            if (!$(e.target).closest('.rs-menu, .rs-menu-toggle').length) {
                $('.rs-menu').removeClass('active');
            }
        });
        
        // Sub-menu toggle for mobile
        if ($(window).width() < 992) {
            $('.menu-item-has-children > a').click(function(e) {
                if ($(this).parent().find('.sub-menu').is(':visible')) {
                    $(this).parent().find('.sub-menu').slideUp();
                } else {
                    $('.sub-menu').slideUp();
                    $(this).parent().find('.sub-menu').slideDown();
                }
                e.preventDefault();
            });
        }
        
        // Initialize Owl Carousel for events
        $('.rs-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
        
        // Initialize slider
        $('#home-slider').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            nav: true,
            dots: true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn'
        });
    });
</script>

@yield('scripts')

</body>
</html>