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
                        <li class="breadcrumb-item active">Student Fees</li>
                    </ul>
                    <a href="{{ route('collection.create') }}">
                        Add New
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <form class="student-group-form">
                                <div class="row">
                                    {{-- <div class="col-md-3 col-6">
                                        <div class="form-group">
                                            <select class="select select2s-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="student_id" class="form-control">
                                                <option value="">Select Student</option>
                                                @foreach($students as $student)
                                                    <option value="{{ $student->id }}" @if($student->id == request('student_id')) selected @endif>{{ $student->name }} - {{ $student->phone }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-3 col-6">
                                        <div class="form-group">
                                            <select class="select select2s-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="bank_id" class="form-control">
                                                <option value="">Select Bank</option>
                                                @foreach($banks as $bank)
                                                    <option value="{{ $bank->id }}" @if($bank->id == request('bank_id')) selected @endif>{{ $bank->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-3 col-6">
                                        <div class="form-group">
                                            <input type="number" name="amount" value="{{ request('amount') }}" class="form-control" placeholder="Search by Amount ...">
                                        </div>
                                    </div> --}}
                                    <div class="col-md-3 col-6">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Paid Date From</label>
                                            <input type="text" class="form-control datetimepicker" id="paid_date_from" value="{{ request('paid_date_from') }}" name="paid_date_from" placeholder="DD-MM-YYYY">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Paid Date To</label>
                                            <input type="text" class="form-control datetimepicker" id="paid_date_to" value="{{ request('paid_date_to') }}" name="paid_date_to" placeholder="DD-MM-YYYY">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12 mb-4">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                        <a  href="{{ route('collection.index') }}" class="btn btn-secondary">Reset</a>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>ID</th>
                                            <th>Bank</th>
                                            <th>File</th>
                                            <th>Paid Date</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($collections as $key => $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ optional($value->bank)->name ?? '—' }}</td>
                                                <td>
                                                    <a href="{{ asset('uploads/collections/' . $value->file) }}" download>
                                                        {{ $value->file }}
                                                    </a>
                                                </td>
                                                <td>{{ $value->paid_date }}</td>
                                                <td class="text-end">
                                                    <div class="actions">
                                                        <a href="{{ route('collection.show', $value->id) }}" class="btn btn-sm bg-primary-light mr-2">
                                                            <i class="far fa-eye me-2"></i>
                                                        </a>
                                                        <a href="{{ asset('uploads/collections/' . $value->file) }}" download class="btn btn-sm bg-primary-light mr-2">
                                                            <i class="fas fa-download me-2"></i>
                                                        </a>
                                                        @if(auth()->user()->role_name == 'Admin')
                                                            <a href="{{ route('collection.edit', $value->id) }}" class="btn btn-sm bg-primary-light">
                                                                <i class="far fa-edit me-2"></i>
                                                            </a>
                                                        @endif
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
