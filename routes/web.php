<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Main pages
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/book', function () {
    return view('book');
})->name('book');

// Services
Route::prefix('services')->group(function () {
    Route::get('/property-management', function () {
        return view('services.property');
    })->name('services.property');

    Route::get('/shortlet', function () {
        return view('services.shortlet');
    })->name('services.shortlet');

    Route::get('/land-sales', function () {
        return view('services.land');
    })->name('services.land');

    Route::get('/property-sales', function () {
        return view('services.propertysales');
    })->name('services.propertysales');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/book', [App\Http\Controllers\BookingController::class, 'store'])->name('book.submit');
Route::get('/properties', function () {
    return view('properties.index');
})->name('properties.index');
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');

Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');

Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');
});
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Properties listing page
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');

// Property detail page
Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.show');

//Admin login
// Admin login page
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

// Admin login submit
Route::post('/admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.login.submit');

// Admin routes
Route::get('admin/login', [AdminController::class, 'loginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


require __DIR__ . '/auth.php';
