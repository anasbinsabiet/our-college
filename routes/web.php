<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get("clear", function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cache cleared";
});

function set_active($route) {
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

// ---------------------- Login / Register ----------------------
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('change/password', [LoginController::class, 'changePassword'])->name('change/password');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'storeUser'])->name('register.store');

// ---------------------- Frontend Routes ----------------------
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');


// ---------------------- User / Student / Teacher ----------------------
Route::match(['get', 'post'], 'user/password-reset', [UserController::class, 'password_reset'])->name('password.reset');
// ---------------------- Auth Routes ----------------------
Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

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

    Route::resource('contacts', ContactController::class, [
        'names' => [
            'index' => 'contact.index',
            'create' => 'contact.create',
            'store' => 'contact.store',
            'show' => 'contact.show',
            'edit' => 'contact.edit',
            'update' => 'contact.update',
        ]
    ]);
});