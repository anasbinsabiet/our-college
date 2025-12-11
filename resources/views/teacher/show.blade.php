@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">teacher Details</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('teacher.index') }}">Teacher List</a></li>
                            <li class="breadcrumb-item active">Teacher Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="row">
            {{-- Left Column: Personal Details --}}
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="mb-1">{{ $teacher->name }}</h4>
                        <p class="text-muted">{{ $teacher->email }}</p>
                        <div class="d-flex justify-content-center gap-3 mt-3">
                            <span class="badge bg-secondary"><i class="feather-phone"></i> {{ $teacher->phone }}</span>
                            <span class="badge bg-secondary"><i class="feather-user"></i> {{ $teacher->gender }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column: Detailed Info --}}
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Teacher Information</h5>
                        <div class="row mb-2">
                            <div class="col-sm-6"><strong>Blood Group:</strong> {{ $teacher->blood_group }}</div>
                            <div class="col-sm-6"><strong>Religion:</strong> {{ $teacher->religion }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6"><strong>Date of Birth:</strong> {{ $teacher->date_of_birth }}</div>
                            <div class="col-sm-6"><strong>Created At:</strong> {{ $teacher->created_at->format('d-m-Y H:i') }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6"><strong>Updated At:</strong> {{ $teacher->updated_at->format('d-m-Y H:i') }}</div>
                            <div class="col-sm-6"><strong>User ID:</strong> {{ $teacher->user_id ?? 'N/A' }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12"><strong>Full Name:</strong> {{ $teacher->name }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12"><strong>Email:</strong> {{ $teacher->email }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12"><strong>Phone Number:</strong> {{ $teacher->phone }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- End Row --}}
    </div>
</div>
@endsection