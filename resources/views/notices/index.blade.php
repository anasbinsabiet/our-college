@extends('layouts.master')
@section('content')



<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Notices</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Notice List</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <form method="GET" action="{{ route('notice.index') }}">
                            <div class="row">
                                <!-- ID -->
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text"
                                               name="id"
                                               class="form-control"
                                               placeholder="Search by ID..."
                                               value="{{ request('id') }}">
                                    </div>
                                </div>

                                <!-- Title -->
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text"
                                               name="title"
                                               class="form-control"
                                               placeholder="Search by Title..."
                                               value="{{ request('title') }}">
                                    </div>
                                </div>

                                <!-- From Date -->
                                <div class="col">
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
                                <div class="col">
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
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                    <a href="{{ route('notice.index') }}" class="btn btn-secondary">Reset</a>
                                    <a href="{{ route('notice.create') }}" class="btn btn-primary">Add New</a>
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
                                                       class="btn btn-sm bg-primary-light">
                                                        <i class="far fa-edit me-2"></i>
                                                    </a>

                                                    <form action="{{ route('notice.destroy', $notice->id) }}"
                                                          method="POST"
                                                          style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm bg-danger-light"
                                                                onclick="return confirm('Are you sure?')">
                                                            <i class="far fa-trash-alt me-2"></i>
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