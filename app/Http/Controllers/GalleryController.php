<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::query()->orderByDesc('id');

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

        $galleries = $query->get();
        $users   = User::select('id', 'name')->get();

        return view('backend.galleries.index', compact('galleries', 'users'));
    }

    public function create()
    {
        return view('backend.galleries.create', [
            'gallery' => null
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
                $uploadPath = public_path('uploads/galleries');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                // Move file
                $file->move($uploadPath, $fileName);
            }

            gallery::create([
                'name'       => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'banner'        => $fileName,
                'created_by'  => auth()->id(),
                'created_at'  => now(),
            ]);

            DB::commit();
            return redirect()->route('gallery.index')->with('success', 'gallery created successfully!');
        } catch (\Throwable $e) {
            return $e->getMessage();
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $gallery = gallery::findOrFail($id);
        return view('backend.galleries.create', compact('gallery'));
    }
    
    public function show($id)
    {
        $gallery = gallery::findOrFail($id);
        return view('backend.galleries.show', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required|max:255',
            'gallery' => 'nullable|max:500',
            'banner'        => 'nullable|file|max:5120',
        ]);

        try {
            DB::beginTransaction();

            $gallery  = gallery::findOrFail($id);
            $oldFile = $gallery->banner;
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
                $uploadPath = public_path('uploads/galleries');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                // Move file
                $file->move($uploadPath, $fileName);
            }

            $gallery->update([
                'name'       => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'banner'        => $fileName,
                'updated_by'  => auth()->id(),
                'updated_at'  => now(),
            ]);

            DB::commit();
            return redirect()->route('gallery.index')->with('success', 'gallery updated successfully!');
        } catch (\Throwable $e) {

            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $gallery = gallery::findOrFail($id);

            if ($gallery->file && file_exists(public_path('uploads/galleries/' . $gallery->file))) {
                unlink(public_path('uploads/galleries/' . $gallery->file));
            }

            $gallery->delete();

            return back()->with('success', 'gallery deleted!');


        } catch (\Throwable $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}