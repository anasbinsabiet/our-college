@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
<section class="hero-bs position-relative text-white">
    <div class="container">
        <div class="row align-items-center min-vh-75">

            {{-- Left Content --}}
            <div class="col-lg-6 text-center text-lg-start mb-5 mb-lg-0 header-left">
                <span class="badge bg-light text-dark px-3 py-2 rounded-pill mb-3 d-inline-block">
                    🎓 Welcome to {{ optional($setting)->title ?? 'Our College' }}
                </span>

                <h1 class="display-5 fw-bold mt-3">
                    Build Your Future With <br>
                    <span class="text-info">Smart Education</span>
                </h1>

                <p class="lead text-light opacity-75 mt-3">
                    We prepare students for intellectual, professional, and personal success
                    through innovation, technology, and excellence.
                </p>

                <div class="d-flex gap-3 justify-content-center justify-content-lg-start mt-4 flex-wrap">
                    <a href="#contact" class="btn btn-info btn-lg px-4">
                        Apply Now
                    </a>
                    <a href="#courses" class="btn btn-outline-light btn-lg px-4">
                        Explore Courses
                    </a>
                </div>
            </div>

            {{-- Right Image --}}
            <div class="col-lg-6 text-center">
                <img
                    src="{{ asset('frontend/images/hero.png') }}"
                    class="img-fluid hero-image"
                    alt="Hero Image">
            </div>

        </div>
    </div>
</section>
<section class="services" id="courses">
    <div class="services-heading">
        <h2>OUR PROFESSIONAL COURSES</h2>
        <p>Lorem ipsum dolor sit amet, consectetur ad asese do eiusmod tempor incididunt utarla oreetdolo magna aliqua
        </p>
    </div>

    <div class="box-container">
        <div class="box">
            <img src="{{ asset('frontend/images/icon5.png') }}" alt="">
            <h4>Batchlor of Computer Application</h4>
            <p>Lorem ipsum dolor sit amet, consectetur ad asese do eiusmod tempor incididunt utarla oreetdolo magna
                aliqua
            </p>
            <a href="#">Apply Now</a>
        </div>

        <div class="box">
            <img src="{{ asset('frontend/images/icon5.png') }}" alt="">
            <h4>Batchlor of Business Administration</h4>
            <p>Lorem ipsum dolor sit amet, consectetur ad asese do eiusmod tempor incididunt utarla oreetdolo magna
                aliqua.
            </p>
            <a href="#">Apply Now</a>
        </div>

        <div class="box">
            <img src="{{ asset('frontend/images/icon5.png') }}" alt="">
            <h4>Bio-Technology</h4>
            <p>Lorem ipsum dolor sit amet, consectetur ad asese do eiusmod tempor incididunt utarla oreetdolo magna
                aliqua
            </p>
            <a href="#">Apply Now</a>
        </div>

        <div class="box">
            <img src="{{ asset('frontend/images/icon5.png') }}" alt="">
            <h4>Computer Science</h4>
            <p>Lorem ipsum dolor sit amet, consectetur ad asese do eiusmod tempor incididunt utarla oreetdolo magna
                aliqua.
            </p>
            <a href="#">Apply Now</a>
        </div>
    </div>
</section>
<section class="notice-section" id="notice">
    <div class="notice-wrapper">
        <h2 class="notice-title">Latest Notices</h2>

        <div class="notice-ticker">
            <ul>
                @foreach ($notices as $notice)
                    <li>
                        <a href="{{ asset('uploads/notices/' . $notice->file) }}" download>
                            📄 {{ $notice->title }}
                        </a>
                        <span class="notice-date">{{ $notice->created_at->format('d M, Y') }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="notice-list">
            @foreach ($notices as $notice)
                <div class="notice-card">
                    <div>
                        <h4>{{ $notice->title }}</h4>
                        <span>{{ $notice->created_at->format('d M, Y') }}</span>
                    </div>
                    <a href="{{ asset('uploads/notices/' . $notice->file) }}" download class="notice-download-btn">
                        Download PDF
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="cta-section" id="contact">
    <div class="cta-container">

        <!-- Left Image -->
        <div class="cta-image">
            <img src="{{ asset('assets/img/login.jpg') }}" alt="University Playground">
        </div>

        <!-- Right Form -->
        <div class="cta-form">
            <h2>Get in Touch</h2>
            <p>Have questions about courses, admission, or campus life? We are here to help.</p>

            <form id="contactForm" class="cta-form-wrapper">
                @csrf

                <div class="alert alert-success d-none" id="contactSuccess">
                    Message sent successfully. We will contact you soon.
                </div>

                <div class="alert alert-danger d-none" id="contactError"></div>

                <div class="form-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="form-group mb-3">
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                </div>

                <div class="form-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                </div>

                <div class="form-group mb-3">
                    <textarea name="message" class="form-control" placeholder="Your Message" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-info w-100 text-white" id="contactBtn">
                    Submit
                </button>
            </form>
        </div>
    </div>
</section>
<script>
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
        const response = await fetch("{{ route('contact.store') }}", {
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
</script>
@endsection