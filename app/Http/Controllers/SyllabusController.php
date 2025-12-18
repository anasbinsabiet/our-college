<?php

namespace App\Http\Controllers;

use App\Models\Syllabus;
use App\Models\User;
use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\DB;

class SyllabusController extends Controller
{
    public function index(Request $request)
    {
        $query = Syllabus::query()->orderByDesc('id');

        // ===== Filters =====
        $query->when($request->id, fn($q) => $q->where('id', $request->id));
        $query->when($request->title, fn($q) => $q->where('title', 'LIKE', "%{$request->title}%"));
        $query->when($request->created_by, fn($q) => $q->where('created_by', $request->created_by));

        if ($request->date_from) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->date_to) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $syllabuses = $query->get();
        $users   = User::select('id', 'name')->get();

        return view('backend.syllabus.index', compact('syllabuses', 'users'));
    }

    public function create()
    {
        return view('backend.syllabus.create', [
            'syllabus' => null
        ]);
    }

    public function store(Request $request)
    {   
        // return $request->all();
        $request->validate([
            'title'       => 'required|max:255',
            'department' => 'nullable|max:500',
            'file'        => 'nullable|file|max:5120',
        ]);

        try {
            DB::beginTransaction();

            $fileName = null;

            if ($request->hasFile('file')) {
                $extension = $request->file('file')->extension();
                $fileName  = 'Syllabus-' . uniqid() . '-' . now()->format('dmY') . '.' . $extension;
                $request->file('file')->move(public_path('uploads/syllabuses'), $fileName);
            }

            Syllabus::create([
                'title'       => $request->title,
                'department' => $request->department,
                'file'        => $fileName,
                'created_by'  => auth()->id(),
                'created_at'  => now(),
            ]);

            DB::commit();
            return redirect()->route('Syllabus.index')->with('success', 'Syllabus created successfully!');
        } catch (\Throwable $e) {
            // return $e->getMessage();
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $syllabus = Syllabus::findOrFail($id);
        return view('backend.syllabus.create', compact('syllabus'));
    }
    
    public function show($id)
    {
        $syllabus = Syllabus::findOrFail($id);
        return view('backend.syllabus.show', compact('syllabus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'department' => 'nullable|max:500',
            'file'        => 'nullable|file|max:5120',
        ]);

        try {
            DB::beginTransaction();

            $Syllabus  = Syllabus::findOrFail($id);
            $oldFile = $Syllabus->file;
            $fileName = $oldFile;

            if ($request->hasFile('file')) {

                if ($oldFile && file_exists(public_path('uploads/syllabuses/' . $oldFile))) {
                    unlink(public_path('uploads/syllabuses/' . $oldFile));
                }

                $extension = $request->file('file')->extension();
                $fileName  = 'Syllabus-' . uniqid() . '-' . now()->format('dmY') . '.' . $extension;

                $request->file('file')->move(public_path('uploads/syllabuses'), $fileName);
            }

            $Syllabus->update([
                'title'       => $request->title,
                'department' => $request->department,
                'file'        => $fileName,
                'updated_by'  => auth()->id(),
                'updated_at'  => now(),
            ]);

            DB::commit();
            return redirect()->route('syllabus.index')->with('success', 'Syllabus updated successfully!');
        } catch (\Throwable $e) {

            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $Syllabus = Syllabus::findOrFail($id);

            if ($Syllabus->file && file_exists(public_path('uploads/syllabuses/' . $Syllabus->file))) {
                unlink(public_path('uploads/syllabuses/' . $Syllabus->file));
            }

            $Syllabus->delete();

            return back()->with('success', 'Syllabus deleted!');


        } catch (\Throwable $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}