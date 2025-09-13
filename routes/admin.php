<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Admin\BlogController;

// All admin routes here
//Admin Funtions

Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});



Route::prefix('admin')->name('admin.')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Users management
    Route::get('users', [AdminController::class, 'users'])->name('users');
    Route::post('users/ban/{id}', [AdminController::class, 'banUser'])->name('users.ban');

    Route::resource('properties', PropertyController::class);
    // Properties management
    Route::get('properties', [PropertyController::class, 'properties'])->name('properties.mgt');
    Route::get('propt-mgt/create-property', [PropertyController::class, 'createProperty'])->name('properties.create');
    Route::post('properties/save', [PropertyController::class, 'storeProperty'])->name('properties.store');
    Route::get('properties/edit/{id}', [PropertyController::class, 'editProperty'])->name('properties.edit');
    Route::put('properties/{id}', [PropertyController::class, 'updateProperty'])->name('properties.update');
    Route::delete('properties/{id}', [PropertyController::class, 'destroyProperty'])->name('properties.destroy');

    // Blogs
    Route::get('blogs', [BlogController::class, 'index'])->name('admin.blogs');
    Route::get('blogs/create-blog', [BlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('blogs', [BlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('blogs/{blog}', [BlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');

});

