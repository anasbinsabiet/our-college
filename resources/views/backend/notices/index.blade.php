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
                    <li class="breadcrumb-item active">All Notices</li>
                </ul>
                <a href="{{ route('notice.create') }}">
                    Add New
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <form method="GET" action="{{ route('notice.index') }}">
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
                                               name="title"
                                               class="form-control"
                                               placeholder="Search by Title..."
                                               value="{{ request('title') }}">
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
                                    <a href="{{ route('notice.index') }}" class="btn btn-secondary">Reset</a>
                                </div>
                            </div>
                        </form>

                        <!-- Table -->
                        <div class="table-responsive mt-3">
                            <table class="table table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>File</th>
                                        <th>Publish Date</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($notices as $notice)
                                        <tr>
                                            <td>{{ $notice->id }}</td>

                                            <td>{{ $notice->title }}</td>

                                            <td>{{ Str::limit($notice->description, 40) }}</td>

                                            <td>
                                                @if($notice->file)
                                                    <a href="{{ asset('uploads/notices/' . $notice->file) }}" download>
                                                        {{ $notice->file }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">No File</span>
                                                @endif
                                            </td>
                                            <td>{{ $notice->created_at->format('d-m-Y') }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="{{ route('notice.edit', $notice->id) }}"
                                                       class="btn btn-sm bg-primary-light mr-2">
                                                        <i class="far fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('notice.destroy', $notice->id) }}"
                                                          method="POST"
                                                          style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm bg-danger"
                                                                onclick="return confirm('Are you sure?')">
                                                            <i class="far fa-trash-alt text-white"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
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