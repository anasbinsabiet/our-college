<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Student;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        // Filter by ID
        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        // Filter by phone number
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->filled('phone')) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }

        $students = $query->orderByDesc('id')->get();

        return view('student.index', compact('students'));
    }

    public function create()
    {   
        $student = null;
        return view('student.create', compact('student'));
    }
    
    /** student save record */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'roll'          => 'required',
            'class'         => 'required|string',
            'phone'  => 'required|string',
            'file'          => 'nullable|image|max:5120',
        ]);

        try {
            DB::beginTransaction();

            $fileName = null;

            if ($request->hasFile('file')) {
                $extension = $request->file('file')->extension();

                $fileName = sprintf(
                    'student-%s-%s.%s',
                    uniqid(),
                    now()->format('d_m_Y'),
                    $extension
                );

                $request->file('file')->move('uploads/students', $fileName);
            }

            Student::create([
                'name'    => $request->name,
                'gender'        => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'roll'          => $request->roll,
                'blood_group'   => $request->blood_group,
                'religion'      => $request->religion,
                'email'         => $request->email,
                'class'         => $request->class,
                'section'       => $request->section,
                'phone'  => $request->phone,
                'file'          => $fileName,
            ]);

            DB::commit();

            Toastr::success('Student added successfully!', 'Success');
            return back();

        } catch (\Throwable $e) {
            DB::rollBack();

            \Log::error('Student Save Error: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());

            Toastr::error('Failed to add student.', 'Error');
            return back()->withErrors([
                'error' => $e->getMessage()
            ]);
        }
    }

    /** view for edit student */
    public function edit($id)
    {
        $student = Student::where('id',$id)->first();
        return view('student.create',compact('student'));
    }
    
    public function show($id)
    {
        $student = Student::where('id',$id)->first();
        return view('student.show',compact('student'));
    }

    /** update record */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required',
            'roll'          => 'required',
            'class'         => 'required|string',
            'phone'  => 'required|string',
            'file'          => 'nullable|image|max:5120',
        ]);

        try {
            DB::beginTransaction();

            $student = Student::findOrFail($id);

            $oldFile = $student->file;
            $fileName = $oldFile;

            // Handle file upload
            if ($request->hasFile('file')) {

                // Delete old file if exists
                if ($oldFile && file_exists(storage_path('uploads/students/' . $oldFile))) {
                    unlink(storage_path('uploads/students/' . $oldFile));
                }

                $extension = $request->file('file')->extension();

                $fileName = sprintf(
                    'student-%s-%s.%s',
                    uniqid(),
                    now()->format('d_m_Y'),
                    $extension
                );

                $request->file('file')->move('uploads/students', $fileName);
            }
            $student->name    = $request->name;
            $student->gender        = $request->gender;
            $student->date_of_birth = $request->date_of_birth;
            $student->roll          = $request->roll;
            $student->blood_group   = $request->blood_group;
            $student->religion      = $request->religion;
            $student->email         = $request->email;
            $student->class         = $request->class;
            $student->section       = $request->section;
            $student->phone  = $request->phone;
            $student->file          = $fileName; // or existing file if unchanged
            $student->save();

            DB::commit();

            Toastr::success('Student updated successfully!', 'Success');
            return back();

        } catch (\Throwable $e) {

            DB::rollBack();

            \Log::error('Student Update Error: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());

            Toastr::error('Failed to update student', 'Error');

            return back()->withErrors([
                'error' => $e->getMessage()
            ]);
        }
    }

    /** student delete */
    public function studentDelete(Request $request)
    {
        DB::beginTransaction();
        try {
           
            if (!empty($request->id)) {
                Student::destroy($request->id);
                unlink(storage_path('app/public/student-photos/'.$request->avatar));
                DB::commit();
                Toastr::success('Student deleted successfully :)','Success');
                return redirect()->back();
            }
    
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Student deleted fail :)','Error');
            return redirect()->back();
        }
    }

    /** student profile page */
    public function studentProfile($id)
    {
        $studentProfile = Student::where('id',$id)->first();
        return view('student.student-profile',compact('studentProfile'));
    }
}
