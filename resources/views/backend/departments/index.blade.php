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
                    <li class="breadcrumb-item active">All Departments</li>
                </ul>
                <a href="{{ route('department.create') }}">
                    Add New
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <form method="GET" action="{{ route('department.index') }}">
                            <div class="row">
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
                                    <a href="{{ route('department.index') }}" class="btn btn-secondary">Reset</a>
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
                                        <th>Description</th>
                                        <th>Banner</th>
                                        <th>Publish Date</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($departments as $department)
                                        <tr>
                                            <td>{{ $department->id }}</td>

                                            <td>{{ $department->name }}</td>

                                            <td>{{ Str::limit($department->description, 40) }}</td>

                                            <td>
                                                <img src="{{ asset('uploads/departments/' . $department->banner) }}" height="100" alt="single" />
                                                @if($department->banner)
                                                    <a href="{{ asset('uploads/departments/' . $department->banner) }}" download>
                                                        {{ $department->banner }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">No File</span>
                                                @endif
                                            </td>
                                            <td>{{ $department->created_at->format('d-m-Y') }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="{{ route('department.show', $department->id) }}"
                                                       class="btn btn-sm bg-primary-light mr-2">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a href="{{ asset('uploads/departments/' . $department->file) }}" download
                                                       class="btn btn-sm bg-primary-light mr-2">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                    <a href="{{ route('department.edit', $department->id) }}"
                                                       class="btn btn-sm bg-primary-light mr-2">
                                                        <i class="far fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('department.destroy', $department->id) }}"
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