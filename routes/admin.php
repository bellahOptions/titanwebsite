<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

// All admin routes here
//Admin Funtions
// Admin routes
Route::get('admin/login', [AdminController::class, 'loginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');
});
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});



Route::prefix('admin')->name('admin.')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');

    // Users management
    Route::get('users', [\App\Http\Controllers\Admin\AdminController::class, 'users'])->name('users');
    Route::post('users/ban/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'banUser'])->name('users.ban');

    // Properties management
    Route::get('properties', [\App\Http\Controllers\Admin\AdminController::class, 'properties'])->name('properties');
    Route::get('properties/create', [\App\Http\Controllers\Admin\AdminController::class, 'createProperty'])->name('properties.create');
    Route::post('properties', [\App\Http\Controllers\Admin\AdminController::class, 'storeProperty'])->name('properties.store');
    Route::get('properties/edit/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'editProperty'])->name('properties.edit');
    Route::put('properties/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'updateProperty'])->name('properties.update');
    Route::delete('properties/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'destroyProperty'])->name('properties.destroy');

    // Other settings
    Route::get('settings', [\App\Http\Controllers\Admin\AdminController::class, 'settings'])->name('settings');
    Route::post('settings', [\App\Http\Controllers\Admin\AdminController::class, 'updateSettings'])->name('settings.update');

    // Testimonials
    Route::get('testimonials', [\App\Http\Controllers\Admin\AdminController::class, 'testimonials'])->name('testimonials');
    Route::post('testimonials', [\App\Http\Controllers\Admin\AdminController::class, 'addTestimonial'])->name('testimonials.add');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/contact', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contact');
});

