<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use DB;
use App\Models\Teacher;
use Carbon\Carbon;

class TeacherController extends Controller
{   
    public function index(Request $request)
    {
        $query = Teacher::query();

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

        // Get filtered teachers
        $teachers = $query->latest()->get();
        $departmentById = Department::select('id', 'name')->pluck('name', 'id')->toArray();
        return view('backend.teacher.index', compact('teachers', 'departmentById'));
    }

    /** add teacher page */
    public function create()
    {
        $teacher = null;
        $departments = Department::select('id', 'name')->get();
        return view('backend.teacher.create',compact('teacher','departments'));
    }

    /** teacher list */
    

    /** save record */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'gender'        => 'required',
            'phone'  => 'required',
            'avatar'          => 'nullable|image|max:5120',
        ]);

        try {
            $fileName = null;

            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $extension = $file->getClientOriginalExtension();
                $fileName = sprintf(
                    'teacher-%s-%s.%s',
                    uniqid(),
                    now()->format('d_m_Y'),
                    $extension
                );
                $uploadPath = public_path('uploads/teachers');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
                $file->move($uploadPath, $fileName);
            }

            $saveRecord = new Teacher;
            $saveRecord->name     = $request->name;
            $saveRecord->gender        = $request->gender;
            $saveRecord->date_of_birth = $request->date_of_birth ? Carbon::createFromFormat('d-m-Y', $request->date_of_birth)->format('Y-m-d') : null;
            $saveRecord->phone  = $request->phone;
            $saveRecord->blood_group   = $request->blood_group;
            $saveRecord->religion      = $request->religion;
            $saveRecord->email         = $request->email;
            $saveRecord->country       = $request->country;
            $saveRecord->designation       = $request->designation;
            $saveRecord->department_id       = $request->department_id;
            $saveRecord->is_hod       = $request->is_hod;
            $saveRecord->avatar        = $fileName;
            $saveRecord->status       = $request->status;
            $saveRecord->address       = $request->address;
            $saveRecord->joining_date       = $request->joining_date ? Carbon::createFromFormat('d-m-Y', $request->joining_date)->format('Y-m-d') : null;
            $saveRecord->leaving_date       = $request->leaving_date ? Carbon::createFromFormat('d-m-Y', $request->leaving_date)->format('Y-m-d') : null;
            $saveRecord->created_by       = auth()->user()->id;
            $saveRecord->save();
   
            return redirect()->back()->with('success', 'Has been added successfully :)');
        } catch(\Exception $e) {
            \Log::info($e);
            // return $e->getMessage(); 
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to Add New Record  :)');
        }
    }

    /** edit record */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $departments = Department::select('id', 'name')->get();
        return view('backend.teacher.create',compact('teacher','departments'));
    }
    
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('backend.teacher.show',compact('teacher'));
    }

    /** update record teacher */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name'     => 'required',
                'gender'        => 'required',
                'phone'  => 'required',
                'avatar'          => 'nullable|image|max:5120',
            ]);

            $teacher = Teacher::findOrFail($id);

            $oldFile = $teacher->avatar;
            $fileName = $oldFile;

            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');

                // Delete old file if exists
                if (!empty($oldFile)) {
                    $oldFilePath = public_path('uploads/teachers/' . $oldFile);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                // Use getClientOriginalExtension() for PHP <8.1 compatibility
                $extension = $file->getClientOriginalExtension();

                $fileName = sprintf(
                    'teacher-%s-%s.%s',
                    uniqid(),
                    now()->format('d_m_Y'),
                    $extension
                );

                // Ensure upload directory exists
                $uploadPath = public_path('uploads/teachers');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                // Move uploaded file
                $file->move($uploadPath, $fileName);

                // Save new file name to teacher model or variable
                $teacher->avatar = $fileName;
            }
            
            $teacher->name    = $request->name;
            $teacher->gender        = $request->gender;
            $teacher->date_of_birth = $request->date_of_birth ? Carbon::createFromFormat('d-m-Y', $request->date_of_birth)->format('Y-m-d') : null;
            $teacher->phone  = $request->phone;
            $teacher->blood_group   = $request->blood_group;
            $teacher->religion      = $request->religion;
            $teacher->email         = $request->email;
            $teacher->country       = $request->country;
            $teacher->designation       = $request->designation;
            $teacher->department_id       = $request->department_id;
            $teacher->is_hod       = $request->is_hod;
            $teacher->avatar          = $fileName;
            $teacher->status       = $request->status;
            $teacher->address       = $request->address;
            $teacher->joining_date       = $request->joining_date ? Carbon::createFromFormat('d-m-Y', $request->joining_date)->format('Y-m-d') : null;
            $teacher->leaving_date       = $request->leaving_date ? Carbon::createFromFormat('d-m-Y', $request->leaving_date)->format('Y-m-d') : null;
            $teacher->updated_by       = auth()->user()->id;
            $teacher->save();
            
            DB::commit();
            return redirect()->back()->with('success', 'Has been update successfully :)');
           
        } catch(\Exception $e) {
            return $e->getMessage();
            DB::rollback();
            \Log::info($e);
            return redirect()->back()->with('error', 'fail, update record  :)');
        }
    }

    /** delete record */
    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            Teacher::destroy($request->id);
            DB::commit();
            return redirect()->back()->with('success', 'Deleted record successfully :)');
        } catch(\Exception $e) {
            DB::rollback();
            \Log::info($e);
            return redirect()->back()->with('error', 'Deleted record fail :)');
        }
    }
}
