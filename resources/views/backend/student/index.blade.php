
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
                        <li class="breadcrumb-item active">All Students</li>
                    </ul>
                    <a href="{{ route('student.create') }}">
                        Add New
                    </a>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table common-shadow">
                        <div class="card-body">
                            <form class="student-group-form">
                                <div class="row">
                                    <div class="col-md-3 col-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search by Name ..." name="name" value="{{ request('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search by Phone ..." name="phone" value="{{ request('phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12 mb-4">
                                        <div class="search-user-btn">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                            <a  href="{{ route('student.index') }}" class="btn btn-secondary">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>DOB</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $key=>$list )
                                        <tr>
                                            <td>{{ $list->id }}</td>
                                            <td><a href="{{ route('student.show', $list->id) }}">{{ $list->name }}</a></td>
                                            <td>{{ $list->class }} {{ $list->section }}</td>
                                            <td>{{ $list->date_of_birth }}</td>
                                            <td>{{ $list->phone }}</td>
                                            <td>{{ $list->email }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="{{ route('student.show', $list->id) }}" class="btn btn-sm bg-primary-light mr-2">
                                                        <i class="far fa-eye me-2"></i>
                                                    </a>
                                                    <a href="{{ route('student.edit', $list->id) }}" class="btn btn-sm bg-primary-light">
                                                        <i class="far fa-edit me-2"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
