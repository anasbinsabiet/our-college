<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $setting = Setting::findOrFail(1);
        return view('setting.index', compact('setting'));
    }

    public function create()
    {
        $setting = null;
        return view('setting.create', compact('setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'phone'       => 'nullable|string|max:255',
            'mobile'      => 'nullable|string|max:255',
            'email'       => 'nullable|email|max:255',
            'address'     => 'nullable|string|max:255',

            'logo'        => 'nullable|image|max:5120',
            'favicon'     => 'nullable|image|max:2048',
            'banner'      => 'nullable|image|max:5120',
        ]);

        try {
            DB::beginTransaction();

            $files = [
                'logo'    => null,
                'favicon' => null,
                'banner'  => null,
            ];

            foreach ($files as $key => $val) {
                if ($request->hasFile($key)) {
                    $fileName = $key . '-' . uniqid() . '.' . $request->file($key)->extension();
                    $request->file($key)->move('uploads/settings', $fileName);
                    $files[$key] = $fileName;
                }
            }

            Setting::create([
                'title'       => $request->title,
                'description' => $request->description,
                'phone'       => $request->phone,
                'mobile'      => $request->mobile,
                'email'       => $request->email,
                'address'     => $request->address,

                'logo'        => $files['logo'],
                'favicon'     => $files['favicon'],
                'banner'      => $files['banner'],

                'created_by'  => auth()->id(),
                'updated_by'  => auth()->id(),
            ]);

            DB::commit();

            Toastr::success('Setting saved successfully!', 'Success');
            return back();

        } catch (\Throwable $e) {
            // return $e->getMessage();
            DB::rollBack();

            \Log::error($e->getMessage());
            Toastr::error('Failed to save.', 'Error');

            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('setting.create', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);

        $request->validate([
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'phone'       => 'nullable|string|max:255',
            'mobile'      => 'nullable|string|max:255',
            'email'       => 'nullable|email|max:255',
            'address'     => 'nullable|string|max:255',

            'logo'        => 'nullable|image|max:5120',
            'favicon'     => 'nullable|image|max:2048',
            'banner'      => 'nullable|image|max:5120',
        ]);

        try {
            DB::beginTransaction();

            $uploadPath = public_path('uploads/settings/');

            $files = ['logo', 'favicon', 'banner'];

            foreach ($files as $file) {

                if ($request->hasFile($file)) {

                    if ($setting->$file && file_exists($uploadPath . $setting->$file)) {
                        unlink($uploadPath . $setting->$file);
                    }

                    $fileName = $file . '-' . uniqid() . '.' . $request->file($file)->extension();
                    $request->file($file)->move($uploadPath, $fileName);
                    $setting->$file = $fileName;
                }
            }

            $setting->title       = $request->title;
            $setting->description = $request->description;
            $setting->phone       = $request->phone;
            $setting->mobile      = $request->mobile;
            $setting->email       = $request->email;
            $setting->address     = $request->address;

            $setting->updated_by = auth()->id();
            $setting->save();

            DB::commit();

            Toastr::success('Setting updated successfully!', 'Success');
            return back();

        } catch (\Throwable $e) {

            DB::rollBack();
            \Log::error($e->getMessage());

            Toastr::error('Failed to update setting.', 'Error');
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $setting = Setting::findOrFail($id);

            $path = public_path('uploads/settings/');

            foreach (['logo', 'favicon', 'banner'] as $file) {
                if ($setting->$file && file_exists($path . $setting->$file)) {
                    unlink($path . $setting->$file);
                }
            }

            $setting->delete();

            DB::commit();

            Toastr::success('Setting deleted successfully!', 'Success');
            return back();

        } catch (\Throwable $e) {

            DB::rollBack();
            Toastr::error('Failed to delete setting.', 'Error');

            return back();
        }
    }
}