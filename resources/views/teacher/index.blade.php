
@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Teachers</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">All Teachers</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- message --}}
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <form class="teacher-group-form">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search by ID ..." name="id" value="{{ request('id') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search by Name ..." name="name" value="{{ request('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search by Phone ..." name="phone" value="{{ request('phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="search-teacher-btn">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                            <a  href="{{ route('teacher.index') }}" class="btn btn-secondary">Reset</a>
                                            <a href="{{ route('teacher.create') }}" class="btn btn-primary">Add New</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-teacher table-hover table-center mb-0 datatable table-striped">
                                    <thead class="teacher-thread">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>DOB</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teachers as $key=>$list )
                                        <tr>
                                            <td>{{ $list->id }}</td>
                                            <td><a href="{{ route('teacher.show', $list->id) }}">{{ $list->name }}</td>
                                            <td>{{ $list->gender }}</td>
                                            <td>{{ $list->date_of_birth }}</td>
                                            <td>{{ $list->phone }}</td>
                                            <td>{{ $list->email }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="{{ route('teacher.show', $list->id) }}" class="btn btn-sm bg-primary-light mr-2">
                                                        <i class="far fa-eye me-2"></i>
                                                    </a>
                                                    <a href="{{ route('teacher.edit', $list->id) }}" class="btn btn-sm bg-primary-light">
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