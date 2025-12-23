@extends('backend.layouts.master')
@section('content')
    <style>
        .img-fluid {
            max-width: 150px;
            max-height: 50px;
            object-fit: contain;
        }
    </style>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="page-sub-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <a class="breadcrumb-item active">{{ optional($setting)->id ? 'Edit' : 'Add' }} Setting</a>
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ optional($setting)->id ? route('setting.update', $setting->id) : route('setting.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (optional($setting)->id)
                    @method('PUT')
                @endif

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">General</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Branding</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">About Page</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body">
                                <h6 class="text-muted mb-4">Website Information</h6>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Website Title</label>
                                        <input type="text" name="title" class="form-control"
                                            value="{{ old('title', $setting->title ?? '') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', $setting->email ?? '') }}">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">Description</label>
                                        <input type="text" name="description" class="form-control"
                                            value="{{ old('description', $setting->description ?? '') }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ old('phone', $setting->phone ?? '') }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Mobile</label>
                                        <input type="text" name="mobile" class="form-control"
                                            value="{{ old('mobile', $setting->mobile ?? '') }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control"
                                            value="{{ old('address', $setting->address ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row g-4 mb-4">

                            @foreach ([['label' => 'Logo', 'name' => 'logo', 'size' => '150x150'], ['label' => 'Favicon', 'name' => 'favicon', 'size' => '32x32'], ['label' => 'Banner', 'name' => 'banner', 'size' => '1200x400']] as $item)
                                <div class="col-md-4">
                                    <div class="card shadow-sm border-0 text-center p-3">
                                        <label class="fw-semibold">{{ $item['label'] }}</label>

                                        <img id="{{ $item['name'] }}-preview"
                                            src="{{ !empty($setting->{$item['name']}) ? asset('uploads/settings/' . $setting->{$item['name']}) : '' }}"
                                            class="img-fluid rounded my-2"
                                            style="{{ empty($setting->{$item['name']}) ? 'display:none;' : '' }}">

                                        <input type="file" name="{{ $item['name'] }}" class="form-control"
                                            onchange="previewImage(event,'{{ $item['name'] }}-preview')">

                                        <small class="text-muted mt-1">{{ $item['size'] }}</small>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body">

                                {{-- Chairman --}}
                                <h6 class="fw-semibold mb-3">Chairman</h6>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-3">
                                        <input type="file" name="chairman_avatar" class="form-control"
                                            onchange="previewImage(event,'chairman-avatar-preview')">
                                        <img id="chairman-avatar-preview"
                                            src="{{ !empty($setting->chairman_avatar) ? asset('uploads/settings/' . $setting->chairman_avatar) : '' }}"
                                            class="img-fluid rounded mt-2"
                                            style="{{ empty($setting->chairman_avatar) ? 'display:none;' : '' }}">
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control mb-2" name="chairman_name" placeholder="Name"
                                            value="{{ old('chairman_name', $setting->chairman_name ?? '') }}">
                                        <input class="form-control mb-2" name="chairman_designation"
                                            placeholder="Designation"
                                            value="{{ old('chairman_designation', $setting->chairman_designation ?? '') }}">
                                        <textarea class="form-control" rows="3" name="chairman_message" placeholder="Message">{{ old('chairman_message', $setting->chairman_message ?? '') }}</textarea>
                                    </div>
                                </div>

                                <hr>

                                {{-- Principal --}}
                                <h6 class="fw-semibold mb-3">Principal</h6>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-3">
                                        <input type="file" name="principal_avatar" class="form-control"
                                            onchange="previewImage(event,'principal-avatar-preview')">
                                        <img id="principal-avatar-preview"
                                            src="{{ !empty($setting->principal_avatar) ? asset('uploads/settings/' . $setting->principal_avatar) : '' }}"
                                            class="img-fluid rounded mt-2"
                                            style="{{ empty($setting->principal_avatar) ? 'display:none;' : '' }}">
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control mb-2" name="principal_name" placeholder="Name"
                                            value="{{ old('principal_name', $setting->principal_name ?? '') }}">
                                        <input class="form-control mb-2" name="principal_designation"
                                            placeholder="Designation"
                                            value="{{ old('principal_designation', $setting->principal_designation ?? '') }}">
                                        <textarea class="form-control" rows="3" name="principal_message" placeholder="Message">{{ old('principal_message', $setting->principal_message ?? '') }}</textarea>
                                    </div>
                                </div>

                                <hr>

                                {{-- Mission Vision --}}
                                <h6 class="fw-semibold mb-3">Mission & Vision</h6>
                                <textarea class="form-control mb-3" name="mission" placeholder="Mission">{{ old('mission', $setting->mission ?? '') }}</textarea>
                                <textarea class="form-control" name="vision" placeholder="Vision">{{ old('vision', $setting->vision ?? '') }}</textarea>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body text-end">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </div>
                </div>
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
