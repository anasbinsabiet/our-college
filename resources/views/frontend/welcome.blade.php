@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
<!-- Slider Area Start -->
<div id="rs-slider" class="slider-overlay-2">     
    <div id="home-slider" class="owl-carousel">
        @if($sliders && $sliders->count() > 0)
            @foreach($sliders as $slider)
                <div class="item">
                    <img src="{{ asset('uploads/sliders/' . $slider->image) }}" alt="{{ $slider->title }}" />
                    <div class="slide-content">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="container text-center">
                                    <h1 class="slider-title">{{ $slider->title }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="item">
                <img src="{{ asset('assets/img/s1.jpg') }}" alt="Welcome to Our College" />
                <div class="slide-content">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="container text-center">
                                <h1 class="slider-title">Welcome to {{ optional($setting)->title ?? 'Our College' }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('assets/img/s2.jpg') }}" alt="Quality Education" />
                <div class="slide-content">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="container text-center">
                                <h1 class="slider-title">Quality Education for All</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>         
</div>
<!-- Slider Area End -->

<!-- Services Start -->
<!-- <div class="rs-services rs-services-style1">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-6">
                <a href="{{ url('principal-message') }}">
                    <div class="services-item rs-animation-hover">
                        <div class="services-icon">
                            <img src="{{ optional($setting)->principal_avatar ? asset('uploads/settings/' . $setting->principal_avatar) : asset('assets/img/logo.png') }}" class="mb-3" height="60">
                        </div>
                        <div class="services-desc">
                            <h4 class="services-title">Principal Corner</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-md-6">
                <a href="{{ url('faculty-staff') }}">
                    <div class="services-item rs-animation-hover">
                        <div class="services-icon">
                            <img src="{{ asset('frontend/images/icons/faculty.png') }}" class="mb-3" height="60">
                        </div>
                        <div class="services-desc">
                            <h4 class="services-title">Faculty & Staffs</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-md-6">
                <a href="{{ url('results') }}">
                    <div class="services-item rs-animation-hover">
                        <div class="services-icon">                             
                            <img src="{{ asset('frontend/images/icons/results.png') }}" class="mb-3" height="60">
                        </div>
                        <div class="services-desc">
                            <h4 class="services-title">Results</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-md-6">
                <a href="{{ url('alumni') }}">
                    <div class="services-item rs-animation-hover">
                        <div class="services-icon">
                            <img src="{{ asset('frontend/images/icons/alumni.png') }}" class="mb-3" height="60">
                        </div>
                        <div class="services-desc">
                            <h4 class="services-title">Alumni</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-md-6">
                <a href="{{ url('clubs') }}">
                    <div class="services-item rs-animation-hover">
                        <div class="services-icon">
                            <img src="{{ asset('frontend/images/icons/clubs.png') }}" class="mb-3" height="60">
                        </div>
                        <div class="services-desc">
                            <h4 class="services-title">Clubs</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-2 col-md-6">
                <a href="{{ url('admission') }}">
                    <div class="services-item rs-animation-hover">
                        <div class="services-icon">
                            <img src="{{ asset('frontend/images/icons/admission.png') }}" class="mb-3" height="60">
                        </div>
                        <div class="services-desc">
                            <h4 class="services-title">Admission Information</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div> -->
<!-- Services End -->

<!-- Principal Message Start -->
<div class="rs-history sec-spacer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 mobile-mb-50">
                <a href="{{ url('principal-message') }}">
                    <img src="{{ optional($setting)->principal_avatar ? asset('uploads/settings/' . $setting->principal_avatar) : asset('assets/img/logo.png') }}" 
                         alt="PRINCIPAL MESSAGE" class="img-fluid rounded shadow">
                </a>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="abt-title">
                    <h2>Principal Message</h2>
                </div>
                <div class="about-desc">
                    @if(optional($setting)->principal_message)
                        {!! optional($setting)->principal_message !!}
                    @else
                        <p>Welcome to our college - a premier institution committed to academic excellence and holistic development. We strive to provide quality education that nurtures both mind and character.</p>
                        <p>Our mission is to create responsible citizens and future leaders who will contribute positively to society. Through innovative teaching methods and a supportive learning environment, we prepare students for success in their chosen fields.</p>
                        <p>Join us in our journey of knowledge, growth, and transformation.</p>
                    @endif
                </div>
                <a href="{{ url('principal-message') }}" class="btn btn-primary mt-3">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- Principal Message End -->

<!-- About Us Start -->
<div id="rs-about" class="rs-about sec-spacer sec-color">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="about-desc">
                    <h3>WELCOME TO {{ optional($setting)->title ?? 'Our College' }}</h3>      
                    <p>{{ optional($setting)->welcome_message ?? 'We are committed to providing quality education that combines academic excellence with character building.' }}</p>
                </div>
                <div class="accordion" id="collegeAccordion">
                    {{-- College History --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseOne"
                                aria-expanded="true"
                                aria-controls="collapseOne">
                                College History
                            </button>
                        </h2>
                        <div id="collapseOne"
                            class="accordion-collapse collapse show"
                            aria-labelledby="headingOne"
                            data-bs-parent="#collegeAccordion">
                            <div class="accordion-body">
                                @if(isset($history))
                                    {!! $history->content !!}
                                @else
                                    <p>Our college was established with a vision to provide quality education to all sections of society.</p>
                                    <p>With state-of-the-art infrastructure and dedicated faculty, we continue to uphold our tradition of excellence.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Mission --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo"
                                aria-expanded="false"
                                aria-controls="collapseTwo">
                                Our Mission
                            </button>
                        </h2>
                        <div id="collapseTwo"
                            class="accordion-collapse collapse"
                            aria-labelledby="headingTwo"
                            data-bs-parent="#collegeAccordion">
                            <div class="accordion-body">
                                @if(isset($mission))
                                    {!! $mission->content !!}
                                @else
                                    <p>
                                        To provide quality education that develops students intellectually, emotionally,
                                        and ethically, preparing them for lifelong learning.
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Vision --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseThree"
                                aria-expanded="false"
                                aria-controls="collapseThree">
                                Our Vision
                            </button>
                        </h2>
                        <div id="collapseThree"
                            class="accordion-collapse collapse"
                            aria-labelledby="headingThree"
                            data-bs-parent="#collegeAccordion">
                            <div class="accordion-body">
                                @if(isset($vision))
                                    {!! $vision->content !!}
                                @else
                                    <p>
                                        To be a center of excellence in education that nurtures innovation,
                                        leadership, and social responsibility.
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="sidebar-area">
                    <div class="latest-courses">
                        <h3 class="title">Notice Board</h3>

                        @foreach($notices->take(3) as $notice)
                            <div class="post-item mb-3">
                                <div class="post-img">
                                    <a href="{{ asset('uploads/notices/' . $notice->file) }}" target="_blank">
                                        <img src="{{ asset('assets/img/pdf.png') }}" 
                                             style="width:70px; height: 70px;" 
                                             alt="PDF Icon" 
                                             title="{{ $notice->title }}">
                                    </a>
                                </div>
                                <div class="post-desc notice-details">
                                    <h4>
                                        <a href="{{ asset('uploads/notices/' . $notice->file) }}" target="_blank">
                                            {{ Str::limit($notice->title, 40) }}
                                        </a>
                                    </h4>
                                    <span class="price">
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            {{ $notice->created_at->format('d/m/Y') }}
                                        </span>
                                    </span>
                                    ...
                                </div>
                            </div>
                        @endforeach

                        <div style="text-align: right; margin-top: 10px;">
                            <a href="{{ url('notice') }}" class="btn btn-sm btn-outline-primary">More Notice</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us End -->

<!-- Counter Up Section Start-->
<div class="rs-counter pt-100 pb-70 bg3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h2 class="counter-title text-white">{{ optional($setting)->title ?? 'Our College' }}</h2>
                    <p class="text-white">{{ optional($setting)->tagline ?? 'Excellence in Education Since Years' }}</p>
                </center>
            </div>
            
            <div class="col-lg-6 col-md-12">
                <div class="counter-content">                            
                    <div class="counter-img rs-image-effect-shine">
                        <img src="{{ asset('assets/img/s3.jpg') }}" 
                             alt="Campus View" class="img-fluid rounded">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="rs-counter-list">
                            <h2 class="counter-number plus" data-count="{{ $teacherCount ?? 94 }}">0</h2>                  
                            <h4 class="counter-desc">TEACHERS</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="rs-counter-list">
                            <h2 class="counter-number plus" data-count="{{ $years ?? 25 }}">0</h2>
                            <h4 class="counter-desc">Years</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="rs-counter-list">
                            <h2 class="counter-number plus" data-count="{{ $studentCount ?? 1500 }}">0</h2>                  
                            <h4 class="counter-desc">STUDENTS</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="rs-counter-list">
                            <h2 class="counter-number plus" data-count="{{ $buildingCount ?? 3 }}">0</h2>
                            <h4 class="counter-desc">Buildings</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter Down Section End -->

<!-- Events Start -->
<!-- <div id="rs-events" class="rs-events sec-spacer education_bg">
    <div class="container">
        <div class="sec-title mb-50 text-center">
            <h2>Recent and Upcoming Events</h2>      
            <p>Stay updated with our latest activities and events</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="rs-carousel owl-carousel">
                    @foreach($events as $event)
                        <div class="event-item">
                            <div class="event-img">
                                <img src="{{ asset('uploads/events/' . $event->image) }}" alt="{{ $event->title }}" />
                                <a class="image-link" href="{{ url('event.details', $event->slug) }}" title="{{ $event->title }}">
                                    <i class="fa fa-link"></i>
                                </a>
                            </div>
                            <div class="events-details sec-color">
                                <div class="event-date">
                                    <i class="fa fa-calendar"></i>
                                    <span>{{ $event?->date?->format('F d, Y') }}</span>
                                </div>
                                <h4 class="event-title">
                                    <a href="{{ url('event.details', $event->slug) }}">{{ Str::limit($event->title, 50) }}</a>
                                </h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Events End -->

<!-- Courses Section Start -->
<div class="services pt-5" id="courses">
    <div class="services-heading text-center mb-5 mt-5">
        <h2>OUR PROFESSIONAL COURSES</h2>
        <p>Comprehensive educational programs designed for academic excellence and career success</p>
    </div>

    <div class="container">
        <div class="row">
            @foreach($departments as $department)
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="box text-center p-4 shadow-sm">
                        <img src="{{ asset('frontend/images/icon5.png') }}" alt="Higher Secondary" class="mb-3" height="60">
                        <h4>{{ $department->name }}</h4>
                        <p>{{ \Illuminate\Support\Str::limit($department->description ?? '', 30) }}</p>
                        <a href="{{ url('department', $department->id) }}" class="btn btn-primary btn-sm mt-2">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Courses Section End -->

<!-- Contact Section Start -->
<section class="cta-section" id="contact">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Image -->
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                <div class="cta-image">
                    <img src="{{ asset('assets/img/b1.jpg') }}" alt="Campus Life" class="img-fluid rounded shadow">
                </div>
            </div>

            <!-- Right Form -->
            <div class="col-lg-6 col-md-6">
                <div class="cta-form">
                    <h2>Get in Touch</h2>
                    <p>Have questions about courses, admission, or campus life? We are here to help.</p>

                    <form id="contactForm" class="cta-form-wrapper">
                        @csrf

                        <div class="alert alert-success d-none" id="contactSuccess">
                            Message sent successfully. We will contact you soon.
                        </div>

                        <div class="alert alert-danger d-none" id="contactError"></div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                        </div>

                        <div class="form-group mb-3">
                            <textarea name="message" class="form-control" placeholder="Your Message" rows="4" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100" id="contactBtn">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script>
    // Counter Animation
    $(document).ready(function() {
        $('.counter-number').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).data('count')
            }, {
                duration: 2000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
        
        // Contact Form Submission
        document.getElementById('contactForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const form = this;
            const btn = document.getElementById('contactBtn');
            const successBox = document.getElementById('contactSuccess');
            const errorBox = document.getElementById('contactError');

            successBox.classList.add('d-none');
            errorBox.classList.add('d-none');
            btn.disabled = true;
            btn.innerText = 'Sending...';

            try {
                const response = await fetch("{{ url('contact') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                        "Accept": "application/json"
                    },
                    body: new FormData(form)
                });

                const data = await response.json();

                if (!response.ok) {
                    throw data;
                }

                successBox.classList.remove('d-none');
                form.reset();

            } catch (error) {
                let message = 'Something went wrong.';
                if (error?.errors) {
                    message = Object.values(error.errors).flat().join('<br>');
                }
                errorBox.innerHTML = message;
                errorBox.classList.remove('d-none');
            } finally {
                btn.disabled = false;
                btn.innerText = 'Submit';
            }
        });
    });
</script>
@endsection