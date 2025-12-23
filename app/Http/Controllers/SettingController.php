<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $setting = Setting::findOrFail(1);
        return view('backend.setting.index', compact('setting'));
    }

    public function create()
    {
        $setting = null;
        return view('backend.setting.create', compact('setting'));
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

            return back()->with('success', 'Setting saved successfully!');

        } catch (\Throwable $e) {
            // return $e->getMessage();
            DB::rollBack();

            \Log::error($e->getMessage());
            return back()
    ->with('error', 'Failed to save.')
    ->withErrors(['error' => $e->getMessage()]);
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
            'chairman_avatar' => 'nullable|image|max:5120',
            'principal_avatar' => 'nullable|image|max:5120',

            'chairman_name' => 'nullable|string|max:255',
            'chairman_designation' => 'nullable|string|max:255',
            'chairman_message' => 'nullable|string|max:500',
            'principal_name' => 'nullable|string|max:255',
            'principal_designation' => 'nullable|string|max:255',
            'principal_message' => 'nullable|string|max:500',
            'mission' => 'nullable|string|max:500',
            'vision' => 'nullable|string|max:500',
        ]);

        try {
            DB::beginTransaction();

            $uploadPath = public_path('uploads/settings/');

            $files = ['logo', 'favicon', 'banner', 'chairman_avatar', 'principal_avatar'];

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

            $setting->chairman_name = $request->chairman_name;
            $setting->chairman_designation = $request->chairman_designation;
            $setting->chairman_message = $request->chairman_message;
            $setting->principal_name = $request->principal_name;
            $setting->principal_designation = $request->principal_designation;
            $setting->principal_message = $request->principal_message;
            $setting->mission = $request->mission;
            $setting->vision = $request->vision;

            $setting->updated_by = auth()->id();
            $setting->save();

            DB::commit();

            return back()->with('success', 'Setting updated successfully!');

        } catch (\Throwable $e) {

            DB::rollBack();
            \Log::error($e->getMessage());

            return back()
    ->with('error', 'Failed to update setting.')
    ->withErrors(['error' => $e->getMessage()]);

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

            return back()->with('success', 'Setting deleted successfully!');

        } catch (\Throwable $e) {

            DB::rollBack();
            return back()->with('error', 'Failed to delete setting.');
        }
    }
}