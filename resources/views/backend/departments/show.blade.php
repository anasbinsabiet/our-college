@extends('backend.layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="page-sub-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <a class="breadcrumb-item active">Department Details</a>
                            <a href="{{ route('department.index') }}">Department List</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-md-12 mx-auto">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Department Details</h5>
                        </div>

                        <div class="card-body">
                            <div class="row g-3">

                                {{-- Title --}}
                                <div class="col-md-4">
                                    <label class="fw-semibold text-muted">Title</label>
                                    <p class="mb-0">{{ $department->title ?? '—' }}</p>
                                </div>

                                {{-- Department --}}
                                <div class="col-md-4">
                                    <label class="fw-semibold text-muted">Department</label>
                                    <p class="mb-0">{{ $department->department ?? '—' }}</p>
                                </div>

                                {{-- Attachment --}}
                                <div class="col-md-4">
                                    <label class="fw-semibold text-muted">Attachment</label>

                                    @if(!empty($department->file))
                                        <a href="{{ asset('uploads/departments/' . $department->file) }}"
                                        download
                                        class="d-flex align-items-center gap-2 text-primary">
                                            <i class="fas fa-download"></i>
                                            <span>Download File</span>
                                        </a>
                                    @else
                                        <p class="mb-0 text-muted">No file attached</p>
                                    @endif
                                </div>

                            </div>
                        </div>

                        {{-- Footer --}}
                        <div class="card-footer text-end bg-white">
                            <a href="{{ route('department.index') }}" class="btn btn-sm btn-outline-secondary">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
