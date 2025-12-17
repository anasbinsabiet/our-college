<?php

namespace App\Http\Controllers;

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
}
