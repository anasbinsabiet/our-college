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
                                    <div class="col-12 col-sm-3">
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
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Department</label>
                                            <select class="form-control" id="department" name="department_id">
                                                <option value="">Select Department</option>
                                                @foreach($departments as $department)
                                                    <option value="{{ $department->id }}" {{ $department->id == optional($gallery)->department_id ? 'selected' : '' }}>{{ $department->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Image</label>
                                            <input type="file" class="form-control" id="file" name="banner" accept="image/*" onchange="previewImage(event)">
                                            <div class="mt-2">
                                                <img id="file-preview" 
                                                    src="{{ optional($gallery)->banner ? asset('uploads/galleries/' . optional($gallery)->banner) : '#' }}" 
                                                    alt="Preview" 
                                                    class="img-thumbnail" 
                                                    width="150" 
                                                    height="150" 
                                                    style="{{ optional($gallery)->banner ? '' : 'display:none;' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function previewImage(event) {
                                            const input = event.target;
                                            const preview = document.getElementById('file-preview');
                                            if (input.files && input.files[0]) {
                                                const reader = new FileReader();
                                                reader.onload = function(e) {
                                                    preview.src = e.target.result;
                                                    preview.style.display = 'block';
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            } else {
                                                preview.style.display = preview.src !== '#' ? 'block' : 'none';
                                            }
                                        }
                                    </script>
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
