<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DarkModeController;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/contact', [ServiceController::class, 'contact'])->name('contact'); // Fixed this to use a contact method

// Property routes (public)
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');

// Blog routes (public)
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');

// Dark mode toggle
Route::post('/toggle-dark-mode', [DarkModeController::class, 'toggle'])->name('toggle-dark-mode');

// Admin auth routes (public)
Route::get('/admin-secret-login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin-secret-login', [AdminAuthController::class, 'login']);
Route::get('/admin-secret-register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin-secret-register', [AdminAuthController::class, 'register']);
Route::post('/admin-secret-logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Authenticated user routes (regular users)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Wishlist routes
    Route::post('/wishlist/{property}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    
    // Booking routes
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin protected routes - SIMPLIFIED AND CORRECTED
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Add admin check to the controller instead of using closure middleware
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Admin-only routes (these will check for admin in their controllers)
    Route::resource('properties', PropertyController::class)->except(['show', 'index', 'show']);
        // Blog routes
    Route::resource('blogs', BlogController::class)->except(['show']);
    
    // Additional blog routes
    Route::post('/blogs/{blog}/toggle-publish', [BlogController::class, 'togglePublish'])->name('blogs.toggle-publish');

    Route::post('/blogs/upload-image', [BlogController::class, 'uploadImage'])->name('blogs.upload-image');
    
    // Additional admin routes
    Route::post('/properties/', [PropertyController::class, 'index'])->name('properties.index'); 
    Route::post('/properties/store', [PropertyController::class, 'store'])->name('properties.store');
    Route::post('/properties/{property}/toggle-featured', [PropertyController::class, 'toggleFeatured'])->name('properties.toggle-featured');
    Route::post('/properties/{property}/toggle-status', [PropertyController::class, 'toggleStatus'])->name('properties.toggle-status');

Route::resource('properties', PropertyController::class);
Route::delete('properties/{property}/delete-image/{imageIndex}', [PropertyController::class, 'deleteImage'])->name('properties.delete-image');

    Route::post('/blogs/store', [BlogController::class, 'store'])->name('blogs.store');

    Route::post('/blogs/', [BlogController::class, 'create'])->name('blogs.create'); 
    Route::post('/blogs/', [BlogController::class, 'index'])->name('blog.index');
    
    // User management
    Route::get('/users', [RegisteredUserController::class, 'create'])->name('users.index');
    Route::resource('users', RegisteredUserController::class)->except(['index']);
    
    // Booking management
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::resource('bookings', BookingController::class)->except(['store', 'index']);
    
     
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/booking-days', [SettingsController::class, 'updateBookingDays'])->name('settings.booking-days');
});

require __DIR__.'/auth.php';