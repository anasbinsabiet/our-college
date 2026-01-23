<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Department;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // HomeController.php
    public function index()
    {
        $setting = Setting::first();
        $notices = Notice::orderBy('created_at', 'desc')
            ->take(10)
            ->get();
        
        $events = Notice::where('created_at', '>=', now())
            ->orWhere('created_at', '>=', now()->subDays(30))
            ->orderBy('created_at', 'asc')
            ->take(6)
            ->get();
        
        $sliders = Notice::get();
        $departments = Department::get();
        
        $teacherCount = Teacher::count();
        $studentCount = Student::count();
        
        return view('frontend.welcome', compact(
            'setting',
            'notices',
            'events',
            'sliders',
            'teacherCount',
            'studentCount',
            'departments'
        ));
    }
    public function about()
    {   
        $setting = Setting::find(1);
        $notices = Notice::orderBy('created_at', 'desc')
            ->take(10)
            ->get();
        return view('frontend.about',compact('setting','notices'));
    }
    public function gallery()
    {   
        $setting = Setting::find(1);
        $galleries = Gallery::get();
        $notices = Notice::latest()->paginate(3);
        return view('frontend.gallery',compact('setting','galleries','notices'));
    }
    public function notice()
    {   
        $setting = Setting::find(1);
        $notices = Notice::latest()->paginate(3);
        return view('frontend.notice',compact('setting', 'notices'));
    }
    public function departmentView($id)
    {   
        $department = Department::find($id);
        $setting = Setting::find(1);
        $notices = Notice::where('department_id', $id)->paginate(3);
        $teachers = Teacher::where('department_id', $id)->whereNot('is_hod', 1)->get();
        $hod = Teacher::where('department_id', $id)->where('is_hod', 1)->first();
        $gallery = Gallery::where('department_id', $id)->get();
        $departmentById = Department::select('id', 'name')->pluck('name', 'id')->toArray();
        return view('frontend.department',compact('setting', 'notices','department','teachers','hod','gallery','departmentById'));
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        Contact::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully'
        ]);
    }
}
