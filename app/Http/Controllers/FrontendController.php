<?php

namespace App\Http\Controllers;

use App\Models\Contact;
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
        
        $events = Notice::where('status', 1)
            ->where('created_at', '>=', now())
            ->orWhere('created_at', '>=', now()->subDays(30))
            ->orderBy('created_at', 'asc')
            ->take(6)
            ->get();
        
        $sliders = Notice::where('status', 1)
            // ->orderBy('order')
            ->get();
        
        $teacherCount = Teacher::where('status', 1)->count();
        $studentCount = Student::where('status', 1)->count();
        
        return view('frontend.welcome', compact(
            'setting',
            'notices',
            'events',
            'sliders',
            'teacherCount',
            'studentCount'
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
    public function notice()
    {   
        $setting = Setting::find(1);
        $notices = Notice::latest()->paginate(3);
        return view('frontend.notice',compact('setting', 'notices'));
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
