@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{ optional($user)->id ? 'Edit' : 'Add' }} User</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
                            <li class="breadcrumb-item active">{{ optional($user)->id ? 'Edit' : 'Add' }} User</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- message --}}
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ optional($user)->id 
                                    ? route('user.update', optional($user)->id) 
                                    : route('user.store') }}" 
                                method="POST" 
                                enctype="multipart/form-data">
                                @if(optional($user)->id)
                                    @method('PUT')
                                @endif                                
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <div class="form-group local-forms">
                                            <label>Name <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ optional($user)->name }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="form-group local-forms">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{ optional($user)->email }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="form-group local-forms">
                                            <label>Phone Number <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="phone" placeholder="Enter Phone" value="{{ optional($user)->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="form-group local-forms">
                                            <label>Date Of Birth</label>
                                            <input type="text" class="form-control datetimepicker" name="date_of_birth" placeholder="DD-MM-YYYY" value="{{ optional($user)->date_of_birth }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="form-group local-forms">
                                            <label>Status <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="status">
                                                <option disabled>Select Status</option>
                                                <option value="Active" {{ optional($user)->status == 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="Disable" {{ optional($user)->status == 'Disable' ? 'selected' : '' }}>Disable</option>
                                                <option value="Inactive" {{ optional($user)->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="form-group local-forms">
                                            <label>Role <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="role_name" id="role_name">
                                                <option selected disabled>Select</option>
                                                @foreach ($role as $name)
                                                    <option value="{{ $name->role_type }}" {{ optional($user)->role_name == $name->role_type ? 'selected' : '' }}>{{ $name->role_type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="form-group local-forms">
                                            <label>Position</label>
                                            <input type="text" class="form-control" name="position" placeholder="Enter Position" value="{{ optional($user)->position }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Photo (150px X 150px)</label>
                                            <input type="file" class="form-control" id="file" name="avatar" accept="image/*" onchange="previewImage(event)">
                                            <div class="mt-2" style="position: absolute;">
                                                <img id="file-preview" 
                                                    src="{{ optional($user)->avatar ? asset('uploads/users/' . optional($user)->avatar) : '#' }}" 
                                                    alt="Preview" 
                                                    class="img-thumbnail" 
                                                    width="150" 
                                                    height="150" 
                                                    style="{{ optional($user)->avatar ? '' : 'display:none;' }}">
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
                                    <div class="col-12 col-md-3">
                                        <div class="form-group local-forms">
                                            <label>Department</label>
                                            <input type="text" class="form-control" name="department" placeholder="Enter Department" value="{{ optional($user)->department }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="student-submit">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a class="btn btn-secondary" href="{{ route('user.index') }}">Cancel</a>
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
