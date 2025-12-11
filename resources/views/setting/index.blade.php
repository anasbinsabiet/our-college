@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{ optional($setting)->id ? 'Edit' : 'Create' }} Settings</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('setting.index') }}">Settings</a></li>
                        <li class="breadcrumb-item active">General Settings</li>
                    </ul>
                </div>
            </div>
        </div>

        

        <form action="{{ optional($setting)->id ? route('setting.update', $setting->id) : route('setting.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(optional($setting)->id)
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Website Basic Details</h5>
                        </div>
                        <div class="card-body">

                            <div class="form-group mb-3">
                                <label>Website Title</label>
                                <input type="text" name="title"
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('title', $setting->title ?? '') }}"
                                       placeholder="Enter website title">
                                @error('title')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label>Description</label>
                                <input type="text" name="description"
                                       class="form-control @error('description') is-invalid @enderror"
                                       value="{{ old('description', $setting->description ?? '') }}"
                                       placeholder="Enter description">
                                @error('description')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email', $setting->email ?? '') }}"
                                       placeholder="Enter contact email">
                                @error('email')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label>Phone</label>
                                <input type="text" name="phone"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       value="{{ old('phone', $setting->phone ?? '') }}"
                                       placeholder="Enter phone number">
                                @error('phone')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label>Mobile</label>
                                <input type="text" name="mobile"
                                       class="form-control @error('mobile') is-invalid @enderror"
                                       value="{{ old('mobile', $setting->mobile ?? '') }}"
                                       placeholder="Enter mobile number">
                                @error('mobile')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label>Address</label>
                                <input type="text" name="address"
                                       class="form-control @error('address') is-invalid @enderror"
                                       value="{{ old('address', $setting->address ?? '') }}"
                                       placeholder="Enter address">
                                @error('address')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div> {{-- /.col-md-6 --}}

                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Media & Branding</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Logo (150 × 150)</label>
                                <input type="file" name="logo" accept="image/*"
                                    class="form-control @error('logo') is-invalid @enderror"
                                    onchange="previewImage(event, 'logo-preview')">

                                @error('logo')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror

                                <div class="mt-2">
                                    <img id="logo-preview"
                                        src="{{ !empty($setting->logo) ? asset('uploads/settings/' . $setting->logo) : '#' }}"
                                        alt="Logo Preview"
                                        class="img-thumbnail"
                                        width="150" height="150"
                                        style="{{ !empty($setting->logo) ? '' : 'display:none;' }}">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Favicon</label>
                                <input type="file" name="favicon" accept="image/*"
                                    class="form-control @error('favicon') is-invalid @enderror"
                                    onchange="previewImage(event, 'favicon-preview')">

                                @error('favicon')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror

                                <div class="mt-2">
                                    <img id="favicon-preview"
                                        src="{{ !empty($setting->favicon) ? asset('uploads/settings/' . $setting->favicon) : '#' }}"
                                        alt="Favicon Preview"
                                        class="img-thumbnail"
                                        width="32"
                                        style="{{ !empty($setting->favicon) ? '' : 'display:none;' }}">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Banner</label>
                                <input type="file" name="banner" accept="image/*"
                                    class="form-control @error('banner') is-invalid @enderror"
                                    onchange="previewImage(event, 'banner-preview')">

                                @error('banner')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror

                                <div class="mt-2">
                                    <img id="banner-preview"
                                        src="{{ !empty($setting->banner) ? asset('uploads/settings/' . $setting->banner) : '#' }}"
                                        alt="Banner Preview"
                                        class="img-thumbnail"
                                        width="200"
                                        style="{{ !empty($setting->banner) ? '' : 'display:none;' }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body text-end">
                            <button type="submit" class="btn btn-primary">Save Settings</button>
                            <a href="{{ route('setting.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div> {{-- /.col-md-6 --}}
            </div> {{-- /.row --}}
        </form>

    </div>
</div>
<script>
function previewImage(event, previewId) {
    const input = event.target;
    const preview = document.getElementById(previewId);

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.style.display = preview.src !== '#' ? 'block' : 'none';
    }
}
</script>
@endsection