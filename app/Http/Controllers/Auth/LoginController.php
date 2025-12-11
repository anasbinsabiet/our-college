<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
use Auth;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
    * Where to redirect users after login.
    *
    * @var string
    */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'locked',
            'unlock'
        ]);
    }
    /** index page login */
    public function login()
    {
        return view('auth.login');
    }

    /** login with databases */
    public function authenticate(Request $request)
    {
        $request->validate([
            'email'    => 'required|string',
            'password' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {

                $user = Auth::user();

                if ($user->status !== 'Active') {
                    Auth::logout();
                    Toastr::error('Your account is inactive. Please contact admin.', 'Error');
                    return redirect('login');
                }

                Toastr::success('Login successfully :)', 'Success');
                return redirect()->route('dashboard');
            }

            Toastr::error('Email or password is incorrect :)', 'Error');
            return redirect('login');

        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Login failed', 'Error');
            return back();
        }
    }

    /** logout */
    public function logout( Request $request)
    {
        Auth::logout();

        Toastr::success('Logout successfully :)','Success');
        return redirect('login');
    }

}
