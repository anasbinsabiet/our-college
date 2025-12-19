<?php

namespace App\Http\Controllers;

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

        return view('backend.teacher.index', compact('teachers'));
    }

    /** add teacher page */
    public function create()
    {
        $teacher = null;
        return view('backend.teacher.create',compact('teacher'));
    }

    /** teacher list */
    

    /** save record */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'gender'        => 'required',
            'phone'  => 'required',
        ]);

        try {
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
        return view('backend.teacher.create',compact('teacher'));
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
            ]);
            
            $teacher = Teacher::findOrFail($id);
            $teacher->name    = $request->name;
            $teacher->gender        = $request->gender;
            $teacher->date_of_birth = $request->date_of_birth ? Carbon::createFromFormat('d-m-Y', $request->date_of_birth)->format('Y-m-d') : null;
            $teacher->phone  = $request->phone;
            $teacher->blood_group   = $request->blood_group;
            $teacher->religion      = $request->religion;
            $teacher->email         = $request->email;
            $teacher->country       = $request->country;
            $teacher->designation       = $request->designation;
            $teacher->status       = $request->status;
            $teacher->address       = $request->address;
            $teacher->joining_date       = $request->joining_date ? Carbon::createFromFormat('d-m-Y', $request->joining_date)->format('Y-m-d') : null;
            $teacher->leaving_date       = $request->leaving_date ? Carbon::createFromFormat('d-m-Y', $request->leaving_date)->format('Y-m-d') : null;
            $teacher->updated_by       = auth()->user()->id;
            $teacher->save();
            
            DB::commit();
            return redirect()->back()->with('success', 'Has been update successfully :)');
           
        } catch(\Exception $e) {
            // return $e->getMessage();
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
