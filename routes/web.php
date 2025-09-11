<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\BlogDisplayController;

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

Route::get('/blog', [BlogDisplayController::class, 'index'])->name('blog');
Route::get('/blog_show/{slug}', [BlogDisplayController::class, 'show'])->name('blogs.show');
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

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/blogs', [BlogController::class, 'index'])->name('admin.blogs');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');
});



require __DIR__ . '/auth.php';
require __DIR__.'/admin.php';