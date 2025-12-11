<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Setting;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

function set_active( $route ) {
    if( is_array( $route ) ){
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('dashboard',function()
    {
        return view('dashboard');
    });
});

Auth::routes();
Route::group(['namespace' => 'App\Http\Controllers\Auth'],function()
{
    // ----------------------------login ------------------------------//
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate');
        Route::get('/logout', 'logout')->name('logout');
        Route::post('change/password', 'changePassword')->name('change/password');
    });

    // ----------------------------- register -------------------------//
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/register','storeUser')->name('register');    
    });
});

Route::group(['namespace' => 'App\Http\Controllers'],function()
{
    // -------------------------- main dashboard ----------------------//
    Route::controller(HomeController::class)->group(function () {
        Route::get('/dashboard', 'index')->middleware('auth')->name('dashboard');
        Route::get('user/profile/page', 'userProfile')->middleware('auth')->name('user/profile/page');
        Route::get('teacher/dashboard', 'teacherDashboardIndex')->middleware('auth')->name('teacher/dashboard');
        Route::get('student/dashboard', 'studentDashboardIndex')->middleware('auth')->name('student/dashboard');
    });

    Route::match(['get', 'post'], 'user/password-reset', [UserController::class, 'password_reset'])->name('password.reset');
    Route::resource('users', UserController::class, [
        'names' => [
            'index' => 'user.index',
            'create' => 'user.create',
            'store' => 'user.store',
            'show' => 'user.show',
            'edit' => 'user.edit',
            'update' => 'user.update',
        ]
    ]);

    // ------------------------ setting -------------------------------//
    Route::controller(Setting::class)->group(function () {
        Route::get('setting', 'index')->middleware('auth')->name('setting');
    });

    Route::resource('teachers', TeacherController::class, [
        'names' => [
            'index' => 'teacher.index',
            'create' => 'teacher.create',
            'store' => 'teacher.store',
            'show' => 'teacher.show',
            'edit' => 'teacher.edit',
            'update' => 'teacher.update',
        ]
    ]);
    
    Route::resource('students', StudentController::class, [
        'names' => [
            'index' => 'student.index',
            'create' => 'student.create',
            'store' => 'student.store',
            'show' => 'student.show',
            'edit' => 'student.edit',
            'update' => 'student.update',
        ]
    ]);
    
    Route::resource('collections', CollectionController::class, [
        'names' => [
            'index' => 'collection.index',
            'create' => 'collection.create',
            'store' => 'collection.store',
            'show' => 'collection.show',
            'edit' => 'collection.edit',
            'update' => 'collection.update',
        ]
    ]);
});