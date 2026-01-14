@extends('backend.layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="page-sub-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <a class="breadcrumb-item active">{{ optional($gallery)->id ? 'Edit' : 'Add' }} Gallery</a>
                            <a href="{{ route('gallery.index') }}">Gallery List</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ optional($gallery)->id 
                                    ? route('gallery.update', $gallery->id) 
                                    : route('gallery.store') }}" 
                                method="POST" 
                                enctype="multipart/form-data">
                                @csrf
                                @if(optional($gallery)->id)
                                    @method('PUT')
                                @endif                                
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ optional($gallery)->name }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Status</label>
                                            <select class="form-control select @error('status') is-invalid @enderror" name="status">
                                                <option value="Active" {{ optional($gallery)->status == 'Active' ? "selected" :""}}>Active</option>
                                                <option value="Inactive" {{ optional($gallery)->status == 'Inactive' ? "selected" :""}}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Banner</label>
                                            <input type="file" class="form-control" id="banner" name="banner">
                                            @if(optional($gallery)->banner)
                                                <a download href="{{ asset('uploads/' . $gallery->banner) }}" 
                                                class="mt-2 d-block text-primary">
                                                    {{ $gallery->banner }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Description</label>
                                            <textarea class="form-control" id="description" name="description">{{ optional($gallery)->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="student-submit d-flex">
                                            <a class="btn btn-secondary mr-2" href="{{ route('gallery.index') }}">Cancel</a>
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
