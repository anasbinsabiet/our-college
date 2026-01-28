@extends('frontend.layouts.app')

@section('title', $department->name ?? 'Department Details')

@section('content')

{{-- ================= HERO ================= --}}
<section class="main" style="background-image:url({{ asset('frontend/images/hero-bg.png') }}); height:220px;">
    <div class="d-flex align-items-center justify-content-center h-100">
        <h1 class="text-white fw-bold about-us-title">{{ $department->name }}</h1>
    </div>
</section>

{{-- ================= MAIN CONTENT ================= --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">

            {{-- ================= LEFT CONTENT ================= --}}
            <div class="col-lg-8">

                {{-- Overview --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h4 class="fw-semibold mb-3">Overview</h4>
                        <div class="text-muted lh-lg">
                            {!! $department->description
                                ?? '<span class="fst-italic text-secondary">No description available.</span>' !!}
                        </div>
                    </div>
                </div>

                {{-- Notices --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h4 class="fw-semibold mb-4">Recent Notices</h4>

                        @forelse ($notices as $notice)
                            <div class="border rounded p-3 mb-3 bg-white">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="fw-semibold mb-1">{{ $notice->title }}</h6>
                                        <small class="text-muted">
                                            {{ $notice->created_at->format('d M, Y') }}
                                        </small>
                                    </div>

                                    @if($notice->file)
                                        <a href="{{ asset('uploads/notices/' . $notice->file) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           download>
                                            Download
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info mb-0">
                                No notices available.
                            </div>
                        @endforelse

                        @if($notices->hasPages())
                            <div class="mt-4">
                                {{ $notices->links() }}
                            </div>
                        @endif
                    </div>
                </div>

                {{-- ================= GALLERY ================= --}}
                @if($gallery)
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="fw-semibold mb-4">Department Gallery</h4>
                        <div class="row g-4">
                            @foreach($gallery as $item)
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 shadow-sm overflow-hidden">
                                        <img
                                            src="{{ asset("uploads/galleries/{$item->banner}") }}"
                                            class="w-100"
                                            style="height:260px;object-fit:cover"
                                            alt="{{ $item->name }}"
                                            loading="lazy"
                                        >
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>

            {{-- ================= RIGHT SIDEBAR (TEACHERS) ================= --}}
            <div class="col-lg-4">
                <div class="position-sticky" style="top:90px">
                    @if($hod)
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <img src="{{ $hod->avatar
                                            ? asset('uploads/teachers/' . $hod->avatar)
                                            : asset('frontend/images/avatar-placeholder.png') }}" 
                                    class="shadow-sm" 
                                    alt="Head of Department"
                                    style="height: 150px;width: 120px;object-fit: contain; border: 4px solid #e5e7eb;" />
                            </div>
                            <h5 class="fw-semibold mb-1">{{ $hod->name }}</h5>
                            <p class="text-primary small mb-2">{{ $hod->designation }}</p>
                            <p class="text-muted small mb-0">
                                <strong>Head of the {{ $department->name }}</strong><br>
                                Department of Sociology<br>
                                Madhabdi University College<br>
                                Madhabdi, Narsingdi
                            </p>
                        </div>
                    </div>
                    @endif
                    <div class="card border-0 shadow-sm mt-4">
                        <div class="card-body p-4">
                            @forelse($teachers as $teacher)
                                <div class="d-flex align-items-center mb-4">
                                    <img
                                        src="{{ $teacher->avatar
                                            ? asset('uploads/teachers/' . $teacher->avatar)
                                            : asset('frontend/images/avatar-placeholder.png') }}"
                                        class="me-3"
                                        style="height: 150px;width: 120px;object-fit: contain; border: 4px solid #e5e7eb;"
                                        alt="{{ $teacher->name }}"
                                        loading="lazy"
                                    />

                                    <div>
                                        <h6 class="mb-0 fw-semibold">{{ $teacher->name }}</h6>
                                        <small class="text-primary">
                                            {{ $teacher->designation }}
                                        </small>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted mb-0">No faculty listed.</p>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection