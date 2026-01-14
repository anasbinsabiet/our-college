@extends('frontend.layouts.app')

@section('title', 'Notice List')

@section('content')
    <section class="main" style="background-image:url({{ asset('frontend/images/hero-bg.png') }}); height:220px;">
        <div class="d-flex align-items-center justify-content-center h-100">
            <h1 class="text-white fw-bold about-us-title">Notice List</h1>
        </div>
    </section>

    {{-- Notice List --}}
    <section class="notice-section container py-5">

        @forelse ($notices as $notice)
            <div class="notice-card">
                <div>
                    <strong>{{ $notice->title }}</strong><br />
                    <span>{{ $notice->created_at->format('d M, Y') }}</span>
                </div>
                <a href="{{ asset('uploads/notices/' . $notice->file) }}" download class="badge notice-download-btn">
                    Download
                </a>
            </div>
        @empty
            <div class="alert alert-info text-center">
                No notices available at the moment.
            </div>
        @endforelse

        {{-- Pagination --}}
        <div class="pagination d-flex justify-content-center mt-5">
            {{ $notices->links() }}
        </div>

    </section>

@endsection