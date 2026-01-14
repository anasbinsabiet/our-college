@extends('frontend.layouts.app')

@section('title', $department->name ?? 'Department Details')

@section('content')
    {{-- Hero --}}
    <section class="main"
        style="background-image:url({{ asset('frontend/images/hero-bg.png') }}); height:220px;">
        <div class="d-flex align-items-center justify-content-center h-100 text-center">
            <h1 class="text-white fw-bold about-us-title">
                {{ $department->name ?? 'Department Details' }}
            </h1>
        </div>
    </section>

    {{-- Overview --}}
    <section class="container py-5">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="mb-3">Overview</h4>
                        <div class="text-muted">
                            {!! $department->description ?? '<span class="text-secondary">—</span>' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Notice List --}}
    <section class="container pb-5">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">

                <h4 class="mb-4">Notice List</h4>

                @forelse ($notices as $notice)
                    <div class="card mb-3 shadow-sm border-0">
                        <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                            <div>
                                <h6 class="mb-1 fw-semibold">{{ $notice->title }}</h6>
                                <small class="text-muted">
                                    {{ $notice->created_at->format('d M, Y') }}
                                </small>
                            </div>

                            <a href="{{ asset('uploads/notices/' . $notice->file) }}"
                               download
                               class="btn btn-outline-primary btn-sm">
                                Download
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info text-center">
                        No notices available at the moment.
                    </div>
                @endforelse

                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-4">
                    {{ $notices->links() }}
                </div>

            </div>
        </div>
    </section>
@endsection