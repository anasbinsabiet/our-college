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
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

function set_active($route) {
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

// ---------------------- Frontend Routes ----------------------
Route::get('/', function () {
    $setting = Setting::find(1);
    $notices = Notice::latest()->take(10)->get();
    return view('welcome', compact('notices', 'setting'));
});

Route::get('/login', [LoginController::class, 'login']);

// ---------------------- Auth Routes ----------------------
Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
});

// ---------------------- Login / Register ----------------------
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('change/password', [LoginController::class, 'changePassword'])->name('change/password');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'storeUser'])->name('register.store');

// ---------------------- User / Student / Teacher ----------------------
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