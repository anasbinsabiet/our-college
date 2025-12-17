<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Notice;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $setting = Setting::find(1);
        $notices = Notice::latest()->take(10)->get();
        return view('frontend.welcome', compact('notices', 'setting'));
    }
    public function about()
    {   
        $setting = Setting::find(1);
        return view('frontend.about',compact('setting'));
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
