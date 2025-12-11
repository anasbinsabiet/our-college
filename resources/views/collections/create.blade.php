@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{ optional($collection)->id ? 'Edit' : 'Add' }} Fees</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('collection.index') }}">Collection List</a></li>
                            <li class="breadcrumb-item active">Add Fees</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ optional($collection)->id 
                                    ? route('collection.update', $collection->id) 
                                    : route('collection.store') }}" 
                                method="POST" 
                                enctype="multipart/form-data">
                                @csrf
                                @if(optional($collection)->id)
                                    @method('PUT')
                                @endif                                
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Student Name</label>
                                            <select class="select select2s-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" id="student_id" name="student_id">
                                                <option selected disabled>-- Select --</option>
                                                @foreach($students as $key => $row)
                                                    <option value="{{ $row->id }}" @if($row->id == optional($collection)->student_id) selected @endif>{{ $row->name }} {{ $row->last_name }} - {{ $row->phone }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Fees Type</label>
                                            <select class="form-control select" id="fees_type" name="fees_type">
                                                <option selected disabled>-- Select Type --</option>
                                                @foreach($feesType as $key => $feesTypes)
                                                    <option value="{{ $feesTypes->fees_type }}" @if($feesTypes->fees_type == optional($collection)->fees_type) selected @endif> {{ $feesTypes->fees_type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Fees Amount</label>
                                            <input type="text" class="form-control" id="fees_amount" name="fees_amount" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" value="{{ optional($collection)->fees_amount }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>File</label>
                                            <input type="file" class="form-control" id="file" name="file">
                                            @if(optional($collection)->file)
                                                <a download href="{{ asset('uploads/' . $collection->file) }}" 
                                                class="mt-2 d-block text-primary">
                                                    {{ $collection->file }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Paid Date</label>
                                            <input type="text" class="form-control datetimepicker" id="paid_date" value="{{ optional($collection)->paid_date ?? now()->format('d-m-Y') }}" name="paid_date" placeholder="DD-MM-YYYY">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="student-submit">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a class="btn btn-secondary" href="{{ route('collection.index') }}">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
