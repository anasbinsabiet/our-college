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
                    <li class="breadcrumb-item active">All Galleries</li>
                </ul>
                <a href="{{ route('gallery.create') }}">
                    Add New
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <form method="GET" action="{{ route('gallery.index') }}">
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
                                    <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Reset</a>
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
                                        <th>Image</th>
                                        <th>Department</th>
                                        <th>Publish Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($galleries as $gallery)
                                        <tr>
                                            <td>{{ $gallery->id }}</td>

                                            <td>{{ $gallery->name }}</td>

                                            <td>{{ Str::limit($gallery->description, 40) }}</td>

                                            <td>
                                                <img src="{{ asset('uploads/galleries/' . $gallery->banner) }}" height="100" alt="single" />
                                            </td>
                                            <td>{{ $departmentById[$gallery->department_id] ?? 'N/A' }}</td>
                                            <td>{{ $gallery->created_at->format('d-m-Y') }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="{{ route('gallery.show', $gallery->id) }}"
                                                       class="btn btn-sm bg-primary-light mr-2">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a href="{{ asset('uploads/galleries/' . $gallery->file) }}" download
                                                       class="btn btn-sm bg-primary-light mr-2">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                    <a href="{{ route('gallery.edit', $gallery->id) }}"
                                                       class="btn btn-sm bg-primary-light mr-2">
                                                        <i class="far fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('gallery.destroy', $gallery->id) }}"
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