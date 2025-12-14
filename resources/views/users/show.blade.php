@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="page-sub-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                <a class="breadcrumb active">User Details</a>
                <a href="{{ route('user.index') }}">User List</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('uploads/users/' . $user->avatar) }}" alt="user Photo" class="img-fluid rounded-circle mb-3" width="150" height="150">
                        <h4 class="mb-1">{{ $user->name }}</h4>
                        <p class="text-muted">{{ $user->email }}</p>
                        <div class="d-flex justify-content-center gap-3 mt-3">
                            <span class="badge bg-secondary"><i class="feather-phone"></i> {{ $user->phone }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">User Information</h5>
                        <div class="mb-2">
                            <div class="col-sm-6"><strong>User ID:</strong> {{ $user->user_id ?? 'N/A' }}</div>
                        </div>
                        <div class="mb-2">
                            <div class="col-sm-6"><strong>Date of Birth:</strong> {{ $user->date_of_birth }}</div>
                        </div>
                        <div class="mb-2">
                            <div class="col-sm-12"><strong>Name:</strong> {{ $user->name }}</div>
                        </div>
                        <div class="mb-2">
                            <div class="col-sm-12"><strong>Email:</strong> {{ $user->email }}</div>
                        </div>
                        <div class="mb-2">
                            <div class="col-sm-12"><strong>Phone Number:</strong> {{ $user->phone }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection