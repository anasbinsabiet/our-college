@extends('frontend.layouts.app')

@section('title', 'About Us')

@section('content')

{{-- Hero --}}
<section class="main"
         style="background-image:url({{ asset('frontend/images/hero-bg.png') }}); height:220px;">
    <div class="d-flex align-items-center justify-content-center h-100">
        <h1 class="text-white fw-bold about-us-title">About Us</h1>
    </div>
</section>

{{-- Intro --}}
<section class="about-section container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">
            About {{ optional($setting)->title ?? 'Our College' }}
        </h2>
        <p class="text-muted mt-3">
            We are dedicated to shaping future leaders through academic excellence,
            innovation, and values-driven education.
        </p>
    </div>

    {{-- Chairman & Principal --}}
    <div class="row g-4 mb-5">
        {{-- Chairman --}}
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center p-4">
                    <img src="{{ asset('frontend/images/chairman.jpg') }}"
                         class="rounded-circle mb-3"
                         width="120"
                         height="120"
                         alt="Chairman">

                    <h5 class="fw-bold mb-1">Mr. Abdul Rahman</h5>
                    <p class="text-muted mb-3">Chairman</p>

                    <p class="text-muted small">
                        Our vision is to build an institution that empowers students
                        with knowledge, ethics, and global competence. We believe
                        education is the foundation of a progressive society.
                    </p>
                </div>
            </div>
        </div>

        {{-- Principal --}}
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center p-4">
                    <img src="{{ asset('frontend/images/principal.jpg') }}"
                         class="rounded-circle mb-3"
                         width="120"
                         height="120"
                         alt="Principal">

                    <h5 class="fw-bold mb-1">Dr. Nusrat Jahan</h5>
                    <p class="text-muted mb-3">Principal</p>

                    <p class="text-muted small">
                        We focus on student-centered learning, modern curriculum,
                        and continuous improvement to ensure academic and personal
                        success for every learner.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Mission & Vision --}}
    <div class="row g-4">
        {{-- Mission --}}
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3">🎯 Our Mission</h4>
                    <p class="text-muted">
                        To provide quality education through innovative teaching,
                        modern infrastructure, and industry-relevant programs that
                        prepare students for global challenges.
                    </p>
                    <ul class="text-muted small">
                        <li>Deliver academic excellence</li>
                        <li>Promote ethical values</li>
                        <li>Encourage innovation & research</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Vision --}}
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3">🚀 Our Vision</h4>
                    <p class="text-muted">
                        To become a leading educational institution recognized for
                        academic innovation, student success, and social impact.
                    </p>
                    <ul class="text-muted small">
                        <li>Global academic standards</li>
                        <li>Future-ready graduates</li>
                        <li>Positive societal contribution</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection