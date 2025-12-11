<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
    public function index(Request $request)
    {
        $query = Notice::query()->orderByDesc('id');

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

        $notices = $query->get();
        $users   = User::select('id', 'name')->get();

        return view('notices.index', compact('notices', 'users'));
    }

    public function create()
    {
        return view('notices.create', [
            'notice' => null
        ]);
    }

    public function store(Request $request)
    {   
        // return $request->all();
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'nullable|max:500',
            'file'        => 'nullable|file|max:5120',
        ]);

        try {
            DB::beginTransaction();

            $fileName = null;

            if ($request->hasFile('file')) {
                $extension = $request->file('file')->extension();
                $fileName  = 'notice-' . uniqid() . '-' . now()->format('dmY') . '.' . $extension;
                $request->file('file')->move(public_path('uploads/notices'), $fileName);
            }

            Notice::create([
                'title'       => $request->title,
                'description' => $request->description,
                'file'        => $fileName,
                'created_by'  => auth()->id(),
                'created_at'  => now(),
            ]);

            DB::commit();
            return redirect()->route('notice.index')->with('success', 'Notice created successfully!');
        } catch (\Throwable $e) {
            return $e->getMessage();
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $notice = Notice::findOrFail($id);
        return view('notices.create', compact('notice'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'nullable|max:500',
            'file'        => 'nullable|file|max:5120',
        ]);

        try {
            DB::beginTransaction();

            $notice  = Notice::findOrFail($id);
            $oldFile = $notice->file;
            $fileName = $oldFile;

            if ($request->hasFile('file')) {

                if ($oldFile && file_exists(public_path('uploads/notices/' . $oldFile))) {
                    unlink(public_path('uploads/notices/' . $oldFile));
                }

                $extension = $request->file('file')->extension();
                $fileName  = 'notice-' . uniqid() . '-' . now()->format('dmY') . '.' . $extension;

                $request->file('file')->move(public_path('uploads/notices'), $fileName);
            }

            $notice->update([
                'title'       => $request->title,
                'description' => $request->description,
                'file'        => $fileName,
                'updated_by'  => auth()->id(),
                'updated_at'  => now(),
            ]);

            DB::commit();
            return redirect()->route('notice.index')->with('success', 'Notice updated successfully!');
        } catch (\Throwable $e) {

            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $notice = Notice::findOrFail($id);

            if ($notice->file && file_exists(public_path('uploads/notices/' . $notice->file))) {
                unlink(public_path('uploads/notices/' . $notice->file));
            }

            $notice->delete();

            return back()->with('success', 'Notice deleted!');


        } catch (\Throwable $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}