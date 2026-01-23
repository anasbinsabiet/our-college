@extends('frontend.layouts.app')

@section('title', 'Member List')

@section('content')

    {{-- Hero Section --}}
    <section class="main" style="background-image:url({{ asset('frontend/images/hero-bg.png') }}); height:220px;">
        <div class="d-flex align-items-center justify-content-center h-100">
            <h1 class="text-white fw-bold about-us-title">Member List</h1>
        </div>
    </section>

    {{-- Member List --}}
    <section class="member-section container py-5">
        <div class="row g-4">

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

@endsection
