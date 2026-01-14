@extends('frontend.layouts.app')

@section('title', 'Gallery')

@section('content')
    {{-- Hero --}}
    <section class="main"
        style="background-image:url({{ asset('frontend/images/hero-bg.png') }}); height:220px;">
        <div class="d-flex align-items-center justify-content-center h-100">
            <h1 class="text-white fw-bold about-us-title">Gallery</h1>
        </div>
    </section>

    {{-- Gallery --}}
    <section class="container py-5">
        <div class="row g-4">

            @forelse ($galleries as $gallery)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card h-100 shadow-sm border-0">
                        <img
                            src="{{ asset('uploads/galleries/' . $gallery->banner) }}"
                            class="card-img-top img-fluid"
                            alt="{{ $gallery->name }}"
                            style="height:220px; object-fit:cover;"
                        >

                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">{{ $gallery->name }}</h5>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No galleries available at the moment.
                    </div>
                </div>
            @endforelse

        </div>
    </section>
@endsection