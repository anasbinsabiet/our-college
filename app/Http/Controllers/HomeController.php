<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    /** home dashboard */
    public function index(Request $request)
    {
        $query = Collection::query();
        if ($request->from && $request->to) {
            $query->whereBetween('paid_date', [
                Carbon::parse($request->from)->toDateString(),
                Carbon::parse($request->to)->toDateString(),
            ]);
        }
        $chart = $query->selectRaw('paid_date, SUM(fees_amount) AS total')
            ->groupBy('paid_date')
            ->orderBy('paid_date')
            ->get();
        return view('backend.dashboard', [
            'users'       => User::count(),
            'students'    => Student::count(),
            'teachers'    => Teacher::count(),
            'collections' => Collection::count(),
            'chart'       => [
                'labels' => $chart->pluck('paid_date'),
                'series' => $chart->pluck('total'),
            ],
            'from' => $request->from,
            'to' => $request->to,
        ]);
    }

    /** profile user */
    public function userProfile()
    {
        return view('dashboard.profile');
    }

    /** teacher dashboard */
    public function teacherDashboardIndex()
    {
        return view('dashboard.teacher_dashboard');
    }

    /** student dashboard */
    public function studentDashboardIndex()
    {
        return view('dashboard.student_dashboard');
    }
}
