@extends('layouts.master')
@section('content')
    
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{ optional($notice)->id ? 'Edit' : 'Add' }} Notice</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('notice.index') }}">Notice List</a></li>
                            <li class="breadcrumb-item active">Add Notice</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ optional($notice)->id 
                                    ? route('notice.update', $notice->id) 
                                    : route('notice.store') }}" 
                                method="POST" 
                                enctype="multipart/form-data">
                                @csrf
                                @if(optional($notice)->id)
                                    @method('PUT')
                                @endif                                
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Title</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ optional($notice)->title }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Description</label>
                                            <input type="text" class="form-control" id="description" name="description" value="{{ optional($notice)->description }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>File</label>
                                            <input type="file" class="form-control" id="file" name="file">
                                            @if(optional($notice)->file)
                                                <a download href="{{ asset('uploads/' . $notice->file) }}" 
                                                class="mt-2 d-block text-primary">
                                                    {{ $notice->file }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="student-submit">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a class="btn btn-secondary" href="{{ route('notice.index') }}">Cancel</a>
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
