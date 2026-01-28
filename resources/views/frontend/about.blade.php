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
                    <img src="{{ optional($setting)->chairman_avatar ? asset('uploads/settings/' . $setting->chairman_avatar) : asset('assets/img/logo.png') }}"
                         class="mb-3"
                         height="60"
                         alt="Chairman" />

                    <h5 class="fw-bold mb-1">{{ optional($setting)->chairman_name }}</h5>
                    <p class="text-muted mb-3">{{ optional($setting)->chairman_designation }}</p>

                    <p class="text-muted small">
                        {{ optional($setting)->chairman_message }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Principal --}}
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center p-4">
                    <img src="{{ optional($setting)->principal_avatar ? asset('uploads/settings/' . $setting->principal_avatar) : asset('assets/img/logo.png') }}"
                         class="mb-3"
                         height="60"
                         alt="Principal">

                    <h5 class="fw-bold mb-1">{{ optional($setting)->principal_name }}</h5>
                    <p class="text-muted mb-3">{{ optional($setting)->principal_designation }}</p>

                    <p class="text-muted small">
                        {!! optional($setting)->principal_message !!}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Member List --}}
    <section class="member-section container py-5">
        <div class="row g-4">
            <center><h3>Member List</h3></center>
            @forelse ($members as $member)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 text-center shadow-sm border-0">
                        <div class="card-body">
                            <img
                                src="{{ asset('images/photo_defaults.png') }}"
                                alt="Member Image"
                                class="rounded-circle mb-3"
                                width="80"
                                height="80"
                                style="height: auto;"
                            >
                            <h6 class="fw-semibold mb-0">
                                {{ $member->name }}
                            </h6>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No members available at the moment.
                    </div>
                </div>
            @endforelse

        </div>
    </section>

    {{-- Mission & Vision --}}
    <div class="row g-4">
        {{-- Mission --}}
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3">🎯 Our Mission</h4>
                    {!! optional($setting)->mission !!}
                </div>
            </div>
        </div>

        {{-- Vision --}}
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3">🚀 Our Vision</h4>
                    {!! optional($setting)->vision !!}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection