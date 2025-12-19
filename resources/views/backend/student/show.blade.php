@extends('backend.layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="page-sub-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                <a class="breadcrumb active">Student Details</a>
                <a href="{{ route('student.index') }}">Student List</a>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="row">
            {{-- Left Column: Personal Details --}}
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ $student->file 
        ? asset('uploads/students/' . $student->file) 
        : asset('assets/img/avatar.png') }}"  alt="Student Photo" class="img-fluid rounded-circle mb-3" width="150" height="150" />
                        <h4 class="mb-1">{{ $student->name }}</h4>
                        <p class="text-muted">{{ $student->email }}</p>
                        <div class="d-flex justify-content-center gap-3 mt-3">
                            <span class="badge bg-secondary"><i class="feather-phone"></i> {{ $student->phone }}</span>
                            <span class="badge bg-secondary"><i class="feather-user"></i> {{ $student->gender }}</span>
                        </div>
                        <div class="mt-3">
                            <span class="badge bg-secondary">Class: {{ $student->class }}</span>
                            <span class="badge bg-secondary">Session: {{ $student->section }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column: Detailed Info --}}
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Student Information</h5>
                        <div class="row mb-2">
                            <div class="col-sm-6"><strong>Full Name:</strong> {{ $student->name }}</div>
                            <div class="col-sm-6"><strong>Email:</strong> {{ $student->email }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6"><strong>Phone Number:</strong> {{ $student->phone }}</div>
                            <div class="col-sm-6"><strong>Religion:</strong> {{ $student->religion }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6"><strong>Roll Number:</strong> {{ $student->roll }}</div>
                            <div class="col-sm-6"><strong>Department:</strong> {{ $student->department }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6"><strong>Session:</strong> {{ $student->section }}</div>
                            <div class="col-sm-6"><strong>Gender:</strong> {{ $student->gender }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6"><strong>Blood Group:</strong> {{ $student->blood_group }}</div>
                            <div class="col-sm-6"><strong>Date of Birth:</strong> {{ $student->date_of_birth }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6"><strong>Added Date:</strong> {{ $student->created_at->format('d-m-Y H:i') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- End Row --}}
    </div>
</div>
@endsection