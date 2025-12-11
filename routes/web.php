<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Models\Notice;
use App\Models\Setting;
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
    $setting = Setting::findOrFail(1);
    $notices = Notice::latest()->take(10)->get();
    return view('welcome', compact('notices', 'setting'));
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
    
    Route::resource('notices', NoticeController::class, [
        'names' => [
            'index' => 'notice.index',
            'create' => 'notice.create',
            'store' => 'notice.store',
            'show' => 'notice.show',
            'edit' => 'notice.edit',
            'update' => 'notice.update',
            'destroy' => 'notice.destroy',
        ]
    ]);

    Route::resource('settings', SettingController::class, [
        'names' => [
            'index' => 'setting.index',
            'create' => 'setting.create',
            'store' => 'setting.store',
            'show' => 'setting.show',
            'edit' => 'setting.edit',
            'update' => 'setting.update',
        ]
    ]);
});