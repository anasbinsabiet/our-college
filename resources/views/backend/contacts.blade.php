@extends('backend.layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="page-sub-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                <ul class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">All Contacts</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <form method="GET" action="{{ route('contact.index') }}">
                            <div class="row">
                                <!-- ID -->
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <input type="text"
                                               name="id"
                                               class="form-control"
                                               placeholder="Search by ID..."
                                               value="{{ request('id') }}">
                                    </div>
                                </div>

                                <!-- Title -->
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <input type="text"
                                               name="name"
                                               class="form-control"
                                               placeholder="Search by Title..."
                                               value="{{ request('name') }}">
                                    </div>
                                </div>
                                
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <input type="text"
                                               name="phone"
                                               class="form-control"
                                               placeholder="Search by Phone..."
                                               value="{{ request('phone') }}">
                                    </div>
                                </div>

                                <!-- From Date -->
                                <div class="col-md-3 col-6">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Date From</label>
                                        <input type="text"
                                               class="form-control datetimepicker"
                                               name="date_from"
                                               value="{{ request('date_from') }}"
                                               placeholder="DD-MM-YYYY">
                                    </div>
                                </div>

                                <!-- To Date -->
                                <div class="col-md-3 col-6">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Date To</label>
                                        <input type="text"
                                               class="form-control datetimepicker"
                                               name="date_to"
                                               value="{{ request('date_to') }}"
                                               placeholder="DD-MM-YYYY">
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="col-md-3 col-12">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                    <a href="{{ route('contact.index') }}" class="btn btn-secondary">Reset</a>
                                </div>
                            </div>
                        </form>

                        <!-- Table -->
                        <div class="table-responsive mt-3">
                            <table class="table table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->id }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ Str::limit($contact->message, 40) }}</td>
                                            <td>{{ $contact->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- /table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection