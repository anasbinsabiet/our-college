@extends('backend.layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="page-sub-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                <a class="breadcrumb active">Member Details</a>
                <a href="{{ route('member.index') }}">Member List</a>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="row">
            {{-- Left Column: Personal Details --}}
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="mb-1">{{ $member->name }}</h4>
                        <p class="text-muted">{{ $member->email }}</p>
                        <div class="d-flex justify-content-center gap-3 mt-3">
                            <span class="badge bg-secondary"><i class="feather-phone"></i> {{ $member->phone }}</span>
                            <span class="badge bg-secondary"><i class="feather-user"></i> {{ $member->gender }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column: Detailed Info --}}
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">member Information</h5>
                        <div class="row mb-2">
                            <div class="col-sm-6"><strong>Blood Group:</strong> {{ $member->blood_group }}</div>
                            <div class="col-sm-6"><strong>Religion:</strong> {{ $member->religion }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6"><strong>Date of Birth:</strong> {{ $member->date_of_birth }}</div>
                            <div class="col-sm-6"><strong>Created At:</strong> {{ $member->created_at->format('d-m-Y H:i') }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6"><strong>Updated At:</strong> {{ $member->updated_at->format('d-m-Y H:i') }}</div>
                            <div class="col-sm-6"><strong>User ID:</strong> {{ $member->user_id ?? 'N/A' }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12"><strong>Full Name:</strong> {{ $member->name }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12"><strong>Email:</strong> {{ $member->email }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12"><strong>Phone Number:</strong> {{ $member->phone }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- End Row --}}
    </div>
</div>
@endsection