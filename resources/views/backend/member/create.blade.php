
@extends('backend.layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="page-sub-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <a class="breadcrumb-item active">{{ optional($member)->id ? 'Edit' : 'Add' }} Member</a>
                            <a href="{{ route('member.index') }}">Members List</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card comman-shadow">
                        <div class="card-body">
                            <form action="{{ optional($member)->id 
                                    ? route('member.update', $member->id) 
                                    : route('member.store') }}" 
                                method="POST" 
                                @csrf
                                @if(optional($member)->id)
                                    @method('PUT')
                                @endif                                
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Full Name" value="{{ optional($member)->name }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Gender <span class="text-danger">*</span></label>
                                            <select class="form-control select  @error('gender') is-invalid @enderror" name="gender">
                                                <option selected disabled>Select Gender</option>
                                                <option value="Female" {{ optional($member)->gender == 'Female' ? "selected" :"Female"}}>Female</option>
                                                <option value="Male" {{ optional($member)->gender == 'Male' ? "selected" :""}}>Male</option>
                                                <option value="Others" {{ optional($member)->gender == 'Others' ? "selected" :""}}>Others</option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Date Of Birth</label>
                                            <input class="form-control datetimepicker @error('date_of_birth') is-invalid @enderror" name="date_of_birth" type="text" placeholder="DD-MM-YYYY" value="{{ optional($member)->date_of_birth }}">
                                            @error('date_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Blood Group</label>
                                            <select class="form-control select @error('blood_group') is-invalid @enderror" name="blood_group">
                                                <option selected disabled>Please Select Group </option>
                                                <option value="A+" {{ optional($member)->blood_group == 'A+' ? "selected" :""}}>A+</option>
                                                <option value="B+" {{ optional($member)->blood_group == 'B+' ? "selected" :""}}>B+</option>
                                                <option value="O+" {{ optional($member)->blood_group == 'O+' ? "selected" :""}}>O+</option>
                                            </select>
                                            @error('blood_group')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Religion</label>
                                            <select class="form-control select @error('religion') is-invalid @enderror" name="religion">
                                                <option selected disabled>Please Select Religion </option>
                                                <option value="Muslim" {{ optional($member)->religion == 'Muslim' ? "selected" :""}}>Muslim</option>
                                                <option value="Hindu" {{ optional($member)->religion == 'Hindu' ? "selected" :""}}>Hindu</option>
                                                <option value="Christian" {{ optional($member)->religion == 'Christian' ? "selected" :""}}>Christian</option>
                                                <option value="Others" {{ optional($member)->religion == 'Others' ? "selected" :""}}>Others</option>
                                            </select>
                                            @error('religion')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>E-Mail</label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="Enter Email Address" value="{{ optional($member)->email }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Phone <span class="text-danger">*</span></label>
                                            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="Enter Phone Number" value="{{ optional($member)->phone }}">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="student-submit d-flex">
                                            <a class="btn btn-secondary mr-2" href="{{ route('member.index') }}">Cancel</a>
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