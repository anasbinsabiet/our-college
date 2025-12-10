@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Fees Collections</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Fees Collections</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">

                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Fees Collections</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="#" class="btn btn-outline-primary me-2">
                                            <i class="fas fa-download"></i> Download
                                        </a>
                                        <a href="{{ route('collections/add') }}" class="btn btn-primary">
                                            <i class="fas fa-plus"></i> Add New
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <form class="student-group-form">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" name="id" class="form-control" placeholder="Search by ID ..." value="{{ request('id') }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <select name="student_id" class="form-control">
                                                <option value="">Select Student</option>
                                                @foreach($students as $student)
                                                    <option value="{{ $student->id }}" @if($student->id == request('student_id')) selected @endif>{{ $student->first_name }} {{ $student->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="number" name="amount" value="{{ request('amount') }}" class="form-control" placeholder="Search by Amount ...">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Paid Date From</label>
                                            <input type="text" class="form-control datetimepicker" id="paid_date_from" value="{{ request('paid_date_from') }}" name="paid_date_from" placeholder="DD-MM-YYYY">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Paid Date To</label>
                                            <input type="text" class="form-control datetimepicker" id="paid_date_to" value="{{ request('paid_date_to') }}" name="paid_date_to" placeholder="DD-MM-YYYY">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="search-student-btn">
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                            <a  href="{{ route('collections') }}" class="btn btn-secondary">Reset</a>
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
                                            <th>Fees Type</th>
                                            <th>Amount</th>
                                            <th>File</th>
                                            <th>Paid Date</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($feesInformation as $key => $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                                                <td>{{ $value->fees_type }}</td>
                                                <td>{{ $value->fees_amount ?? 0 }} &#2547;</td>
                                                <td>
                                                    <a href="{{ asset('uploads/' . $value->file) }}" download>
                                                        {{ $value->file }}
                                                    </a>
                                                </td>
                                                <td>{{ $value->paid_date }}</td>s
                                                <td class="text-end">
                                                    <div class="actions">
                                                        <a href="{{ route('collections.edit', $value->id) }}" class="btn btn-sm bg-danger-light">
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
