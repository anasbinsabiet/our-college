<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Member;
 

class MemberController extends Controller
{   
    public function index(Request $request)
    {
        $query = Member::query();

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

        // Get filtered members
        $members = $query->latest()->get();

        return view('backend.member.index', compact('members'));
    }

    /** add member page */
    public function create()
    {
        $member = null;
        return view('backend.member.create',compact('member'));
    }

    /** member list */
    

    /** save record */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'gender'        => 'required',
            'phone'  => 'required',
        ]);

        try {

            $saveRecord = new Member;
            $saveRecord->name     = $request->name;
            $saveRecord->gender        = $request->gender;
            $saveRecord->date_of_birth = $request->date_of_birth;
            $saveRecord->phone  = $request->phone;
            $saveRecord->blood_group   = $request->blood_group;
            $saveRecord->religion      = $request->religion;
            $saveRecord->email         = $request->email;
            $saveRecord->country       = $request->country;
            $saveRecord->save();
   
            return redirect()->back()->with('success', 'Has been add successfully :)');
        } catch(\Exception $e) {
            \Log::info($e);
            DB::rollback();
            return redirect()->back()->with('error', 'fail, Add new record  :)');
        }
    }

    /** edit record */
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('backend.member.create',compact('member'));
    }
    
    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view('backend.member.show',compact('member'));
    }

    /** update record member */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name'     => 'required',
                'gender'        => 'required',
                'phone'  => 'required',
            ]);
            
            $member = Member::findOrFail($id);
            $member->name    = $request->name;
            $member->gender        = $request->gender;
            $member->date_of_birth = $request->date_of_birth;
            $member->phone  = $request->phone;
            $member->blood_group   = $request->blood_group;
            $member->religion      = $request->religion;
            $member->email         = $request->email;
            $member->country       = $request->country;
            $member->save();
            
            DB::commit();
            return redirect()->back()->with('success', 'Has been update successfully :)');
           
        } catch(\Exception $e) {
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
            Member::destroy($request->id);
            DB::commit();
            return redirect()->back()->with('success', 'Deleted record successfully :)');
        } catch(\Exception $e) {
            DB::rollback();
            \Log::info($e);
            return redirect()->back()->with('error', 'Deleted record fail :)');
        }
    }
}
