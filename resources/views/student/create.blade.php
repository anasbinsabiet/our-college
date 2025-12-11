
@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">{{ optional($student)->id ? 'Edit' : 'Add' }} Students</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Student List</a></li>
                                <li class="breadcrumb-item active">Add Students</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card comman-shadow">
                        <div class="card-body">
                            <form action="{{ optional($student)->id 
                                    ? route('student.update', $student->id) 
                                    : route('student.store') }}" 
                                method="POST" 
                                enctype="multipart/form-data">
                                @if(optional($student)->id)
                                    @method('PUT')
                                @endif                                
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Full Name" value="{{ optional($student)->name }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Gender</label>
                                            <select class="form-control select  @error('gender') is-invalid @enderror" name="gender">
                                                <option selected disabled>Select Gender</option>
                                                <option value="Female" {{ optional($student)->gender == 'Female' ? "selected" :"Female"}}>Female</option>
                                                <option value="Male" {{ optional($student)->gender == 'Male' ? "selected" :""}}>Male</option>
                                                <option value="Others" {{ optional($student)->gender == 'Others' ? "selected" :""}}>Others</option>
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
                                            <input class="form-control datetimepicker @error('date_of_birth') is-invalid @enderror" name="date_of_birth" type="text" placeholder="DD-MM-YYYY" value="{{ optional($student)->date_of_birth }}">
                                            @error('date_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Roll <span class="text-danger">*</span></label>
                                            <input class="form-control @error('roll') is-invalid @enderror" type="text" name="roll" placeholder="Enter Roll Number" value="{{ optional($student)->roll }}">
                                            @error('roll')
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
                                                <option value="A+" {{ optional($student)->blood_group == 'A+' ? "selected" :""}}>A+</option>
                                                <option value="B+" {{ optional($student)->blood_group == 'B+' ? "selected" :""}}>B+</option>
                                                <option value="O+" {{ optional($student)->blood_group == 'O+' ? "selected" :""}}>O+</option>
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
                                                <option value="Muslim" {{ optional($student)->religion == 'Muslim' ? "selected" :""}}>Muslim</option>
                                                <option value="Hindu" {{ optional($student)->religion == 'Hindu' ? "selected" :""}}>Hindu</option>
                                                <option value="Christian" {{ optional($student)->religion == 'Christian' ? "selected" :""}}>Christian</option>
                                                <option value="Others" {{ optional($student)->religion == 'Others' ? "selected" :""}}>Others</option>
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
                                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="Enter Email Address" value="{{ optional($student)->email }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Class <span class="text-danger">*</span></label>
                                            <select class="form-control select @error('class') is-invalid @enderror" name="class">
                                                <option selected disabled>Select Class </option>
                                                <option value="12" {{ optional($student)->class == '12' ? "selected" :""}}>12</option>
                                                <option value="11" {{ optional($student)->class == '11' ? "selected" :""}}>11</option>
                                                <option value="10" {{ optional($student)->class == '10' ? "selected" :""}}>10</option>
                                                <option value="9" {{ optional($student)->class == '9' ? "selected" :""}}>9</option>
                                                <option value="8" {{ optional($student)->class == '8' ? "selected" :""}}>8</option>
                                                <option value="7" {{ optional($student)->class == '7' ? "selected" :""}}>7</option>
                                                <option value="6" {{ optional($student)->class == '6' ? "selected" :""}}>6</option>
                                            </select>
                                            @error('class')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Section</label>
                                            <select class="form-control select @error('section') is-invalid @enderror" name="section">
                                                <option selected disabled>Select Section </option>
                                                <option value="A" {{ optional($student)->section == 'A' ? "selected" :""}}>A</option>
                                                <option value="B" {{ optional($student)->section == 'B' ? "selected" :""}}>B</option>
                                                <option value="C" {{ optional($student)->section == 'C' ? "selected" :""}}>C</option>
                                            </select>
                                            @error('section')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Phone <span class="text-danger">*</span></label>
                                            <input class="form-control @error('phone') is-invalid @enderror" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" name="phone" placeholder="Enter Phone Number" value="{{ optional($student)->phone }}">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group local-forms">
                                            <label>Photo (150px X 150px)</label>
                                            <input type="file" class="form-control" id="file" name="file" accept="image/*" onchange="previewImage(event)">
                                            <div class="mt-2">
                                                <img id="file-preview" 
                                                    src="{{ optional($student)->file ? asset('uploads/students/' . $student->file) : '#' }}" 
                                                    alt="Preview" 
                                                    class="img-thumbnail" 
                                                    width="150" 
                                                    height="150" 
                                                    style="{{ optional($student)->file ? '' : 'display:none;' }}">
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
                                            // If no new file selected, keep existing image visible
                                            preview.style.display = preview.src !== '#' ? 'block' : 'none';
                                        }
                                    }
                                    </script>
                                    <div class="col-12">
                                        <div class="student-submit">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a class="btn btn-secondary" href="{{ route('student.index') }}">Cancel</a>
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
