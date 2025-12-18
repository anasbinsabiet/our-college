@extends('backend.layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="page-sub-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <a class="breadcrumb-item active">{{ optional($syllabus)->id ? 'Edit' : 'Add' }} Syllabus</a>
                            <a href="{{ route('syllabus.index') }}">Syllabus List</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ optional($syllabus)->id 
                                    ? route('syllabus.update', $syllabus->id) 
                                    : route('syllabus.store') }}" 
                                method="POST" 
                                enctype="multipart/form-data">
                                @csrf
                                @if(optional($syllabus)->id)
                                    @method('PUT')
                                @endif                                
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Title</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ optional($syllabus)->title }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Department</label>
                                            <input type="text" class="form-control" id="department" name="department" value="{{ optional($syllabus)->department }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>File</label>
                                            <input type="file" class="form-control" id="file" name="file">
                                            @if(optional($syllabus)->file)
                                                <a download href="{{ asset('uploads/' . $syllabus->file) }}" 
                                                class="mt-2 d-block text-primary">
                                                    {{ $syllabus->file }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="student-submit d-flex">
                                            <a class="btn btn-secondary mr-2" href="{{ route('syllabus.index') }}">Cancel</a>
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
