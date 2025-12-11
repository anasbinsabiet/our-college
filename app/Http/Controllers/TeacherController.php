<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Teacher;
use Brian2694\Toastr\Facades\Toastr;

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

        return view('teacher.index', compact('teachers'));
    }

    /** add teacher page */
    public function create()
    {
        $teacher = null;
        return view('teacher.create',compact('teacher'));
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
            $saveRecord->date_of_birth = $request->date_of_birth;
            $saveRecord->phone  = $request->phone;
            $saveRecord->blood_group   = $request->blood_group;
            $saveRecord->religion      = $request->religion;
            $saveRecord->email         = $request->email;
            $saveRecord->country       = $request->country;
            $saveRecord->save();
   
            Toastr::success('Has been add successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            \Log::info($e);
            DB::rollback();
            Toastr::error('fail, Add new record  :)','Error');
            return redirect()->back();
        }
    }

    /** edit record */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teacher.create',compact('teacher'));
    }
    
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teacher.show',compact('teacher'));
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
            $teacher->date_of_birth = $request->date_of_birth;
            $teacher->phone  = $request->phone;
            $teacher->blood_group   = $request->blood_group;
            $teacher->religion      = $request->religion;
            $teacher->email         = $request->email;
            $teacher->country       = $request->country;
            $teacher->save();
            
            Toastr::success('Has been update successfully :)','Success');
            DB::commit();
            return redirect()->back();
           
        } catch(\Exception $e) {
            DB::rollback();
            \Log::info($e);
            Toastr::error('fail, update record  :)','Error');
            return redirect()->back();
        }
    }

    /** delete record */
    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {

            Teacher::destroy($request->id);
            DB::commit();
            Toastr::success('Deleted record successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            \Log::info($e);
            Toastr::error('Deleted record fail :)','Error');
            return redirect()->back();
        }
    }
}
