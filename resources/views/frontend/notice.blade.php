@extends('frontend.layouts.app')

@section('title', 'Notice List')

@section('content')

<style>
    /* ===== Notice Hero ===== */
.notice-hero {
    height: 220px;
    background-size: cover;
    background-position: center;
    position: relative;
}

.notice-hero-overlay {
    background: linear-gradient(
        to right,
        rgba(0,0,0,0.55),
        rgba(0,0,0,0.25)
    );
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.notice-hero-title {
    color: #fff;
    font-size: 2.4rem;
    font-weight: 700;
    letter-spacing: -0.5px;
}

/* ===== Notice Cards ===== */
.notice-section {
    max-width: 900px;
}

.notice-card {
    display: flex;
    gap: 20px;
    padding: 24px;
    margin-bottom: 24px;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(8px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.05);
}

.notice-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 45px rgba(0,0,0,0.1);
}

/* Date badge */
.notice-date {
    min-width: 70px;
    height: 70px;
    border-radius: 14px;
    background: linear-gradient(135deg, #6366f1, #4f46e5);
    color: #fff;
    font-weight: 700;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Content */
.notice-content {
    flex: 1;
}

.notice-title {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 8px;
    color: #111827;
}

.notice-description {
    color: #6b7280;
    line-height: 1.7;
    margin-bottom: 10px;
}

.notice-meta {
    font-size: 0.85rem;
    color: #9ca3af;
}

/* Pagination */
.pagination {
    gap: 6px;
}

.pagination .page-link {
    border-radius: 10px;
    border: none;
    box-shadow: 0 4px 10px rgba(0,0,0,0.06);
}

.pagination .page-item.active .page-link {
    background: #4f46e5;
}

svg.w-5.h-5 {
    height: 10px;
}
nav.flex.items-center.justify-between
 {
    position: relative;
}
.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between {
    display: flex;
    gap: 20px;
    margin-top: 17px;
}

</style>

<section class="main"
         style="background-image:url({{ asset('frontend/images/hero-bg.png') }}); height:220px;">
    <div class="d-flex align-items-center justify-content-center h-100">
        <h1 class="text-white fw-bold about-us-title">Notice List</h1>
    </div>
</section>

{{-- Notice List --}}
<section class="notice-section container py-5">

    @forelse ($notices as $notice)
        <div class="notice-card">
            <div>
                <h4>{{ $notice->title }}</h4>
                <span>{{ $notice->created_at->format('d M, Y') }}</span>
            </div>
            <a href="{{ asset('uploads/notices/' . $notice->file) }}" download class="notice-download-btn">
                Download PDF
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
