<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Department::query()->orderByDesc('id');

        // ===== Filters =====
        $query->when($request->id, fn($q) => $q->where('id', $request->id));
        $query->when($request->name, fn($q) => $q->where('name', 'LIKE', "%{$request->name}%"));
        $query->when($request->created_by, fn($q) => $q->where('created_by', $request->created_by));

        if ($request->date_from) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->date_to) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $departments = $query->get();
        $users   = User::select('id', 'name')->get();

        return view('backend.departments.index', compact('departments', 'users'));
    }

    public function create()
    {
        return view('backend.departments.create', [
            'department' => null
        ]);
    }

    public function store(Request $request)
    {   
        // return $request->all();
        $request->validate([
            'name'       => 'required|max:255',
            'description' => 'nullable|max:500',
            'banner'        => 'nullable|file|max:5120',
        ]);
        try {
            DB::beginTransaction();

            $fileName = null;

            if ($request->hasFile('banner')) {
                $file = $request->file('banner');

                // Use getClientOriginalExtension() instead of ->extension()
                $file_extension = $file->getClientOriginalExtension();

                $fileName = sprintf(
                    'collection-%s-%s.%s',
                    uniqid(),
                    now()->format('d_m_Y'),
                    $file_extension
                );

                // Ensure folder exists
                $uploadPath = public_path('uploads/departments');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                // Move file
                $file->move($uploadPath, $fileName);
            }

            Department::create([
                'name'       => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'banner'        => $fileName,
                'created_by'  => auth()->id(),
                'created_at'  => now(),
            ]);

            DB::commit();
            return redirect()->route('department.index')->with('success', 'Department created successfully!');
        } catch (\Throwable $e) {
            return $e->getMessage();
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('backend.departments.create', compact('department'));
    }
    
    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view('backend.departments.show', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required|max:255',
            'department' => 'nullable|max:500',
            'banner'        => 'nullable|file|max:5120',
        ]);

        try {
            DB::beginTransaction();

            $department  = Department::findOrFail($id);
            $oldFile = $department->banner;
            $fileName = $oldFile;

            if ($request->hasFile('banner')) {
                $file = $request->file('banner');

                // Use getClientOriginalExtension() instead of ->extension()
                $file_extension = $file->getClientOriginalExtension();

                $fileName = sprintf(
                    'collection-%s-%s.%s',
                    uniqid(),
                    now()->format('d_m_Y'),
                    $file_extension
                );

                // Ensure folder exists
                $uploadPath = public_path('uploads/departments');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                // Move file
                $file->move($uploadPath, $fileName);
            }

            $department->update([
                'name'       => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'banner'        => $fileName,
                'updated_by'  => auth()->id(),
                'updated_at'  => now(),
            ]);

            DB::commit();
            return redirect()->route('department.index')->with('success', 'department updated successfully!');
        } catch (\Throwable $e) {

            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $department = Department::findOrFail($id);

            if ($department->file && file_exists(public_path('uploads/departments/' . $department->file))) {
                unlink(public_path('uploads/departments/' . $department->file));
            }

            $department->delete();

            return back()->with('success', 'Department deleted!');


        } catch (\Throwable $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}