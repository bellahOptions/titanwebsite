<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminInspectionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TermstController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;




// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/careers', [HomeController::class, 'careers'])->name('careers');
// User Side
Route::get('/terms-of-service', [\App\Http\Controllers\TermsController::class, 'show'])->name('terms');

Route::prefix('admin')->middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('terms/edit', [\App\Http\Controllers\TermsController::class, 'edit'])->name('admin.terms.edit');
    Route::post('terms/update', [\App\Http\Controllers\TermsController::class, 'update'])->name('admin.terms.update');
});



// Property routes (public)
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');

// Blog routes (public)
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');

// Purchase routes
Route::middleware(['auth'])->group(function () {
    Route::get('/properties/{property}/purchase/checkout', [PurchaseController::class, 'checkout'])->name('purchases.checkout');
    Route::post('/properties/{property}/purchase/process', [PurchaseController::class, 'processPurchase'])->name('purchases.process');
});

// Rental routes
Route::middleware(['auth'])->group(function () {
    Route::get('/properties/{property}/rent', [RentalController::class, 'showRentalForm'])->name('rentals.form');
    Route::post('/properties/{property}/rent/process', [RentalController::class, 'processRental'])->name('rentals.process');
});

Route::get('/admin-secret-login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin-secret-login', [AdminAuthController::class, 'login'])->middleware('throttle:5,1');

Route::post('/admin-register-request', [AdminAuthController::class, 'verifySecretKey'])
    ->name('admin.register.request')
    ->middleware('throttle:5,1');

Route::get('/admin-secret-register', [AdminAuthController::class, 'showRegistrationForm'])
    ->name('admin.register');

Route::post('/admin-secret-register', [AdminAuthController::class, 'register'])
    ->name('admin.register.save')
    ->middleware('throttle:5,1');

Route::post('/admin-secret-logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Authenticated user routes (regular users)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/purchases/confirmation/{order}', [PurchaseController::class, 'confirmation'])->name('purchases.confirmation');
    Route::get('/rentals/confirmation/{order}', [RentalController::class, 'confirmation'])->name('rentals.confirmation');

    // Wishlist routes
    Route::post('/wishlist/{property}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Reviews (require login)
    Route::post('/properties/{property}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    // Comments (require login)
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

// Admin protected routes
Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::post('/settings/booking-days', [SettingsController::class, 'updateBookingDays'])->name('settings.booking-days');

    // Orders
    Route::get('/orders', [App\Http\Controllers\AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [App\Http\Controllers\AdminOrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}/mark-paid', [App\Http\Controllers\AdminOrderController::class, 'markAsPaid'])->name('orders.mark-paid');
    Route::patch('/orders/{order}/status', [App\Http\Controllers\AdminOrderController::class, 'updateStatus'])->name('orders.update-status');

    // Inspection days
    Route::get('/inspection-days', [AdminInspectionController::class, 'index'])->name('inspection-days.index');
    Route::post('/inspection-days', [AdminInspectionController::class, 'store'])->name('inspection-days.store');
    Route::put('/inspection-days/{inspectionDay}', [AdminInspectionController::class, 'update'])->name('inspection-days.update');
    Route::delete('/inspection-days/{inspectionDay}', [AdminInspectionController::class, 'destroy'])->name('inspection-days.destroy');

    // Reviews
    Route::get('/reviews', [AdminController::class, 'reviews'])->name('reviews.index');
    Route::patch('/reviews/{review}/approve', [AdminController::class, 'approveReview'])->name('reviews.approve');

    // Properties (admin CRUD, except show/index)
    Route::resource('properties', PropertyController::class)->except(['show', 'index']);
     Route::get('/propt', function () {
        return view('admin.propt.index');
    });
    Route::get('/properties/mgt', [PropertyController::class, 'adminIndex'])->name('properties.mgt');
    Route::post('/properties/upload-image', [PropertyController::class, 'uploadImage'])->name('properties.upload-image');
    Route::post('/properties/{property}/toggle-featured', [PropertyController::class, 'toggleFeatured'])->name('properties.toggle-featured');
    Route::post('/properties/{property}/toggle-status', [PropertyController::class, 'toggleStatus'])->name('properties.toggle-status');
    Route::delete('properties/{property}/delete-image/{imageIndex}', [PropertyController::class, 'deleteImage'])->name('properties.delete-image');
    Route::delete('/properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');
    Route::put('/admin/properties/{property}', [PropertyController::class, 'update'])
    ->name('properties.update');
    Route::get('/admin/properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit');



    // Blogs (admin CRUD, except show)
    Route::resource('blogs', BlogController::class)->except(['show']);
    Route::get('/blogs/list', [BlogController::class, 'adminIndex'])->name('blogs.list');
    Route::post('/blogs/{blog}/toggle-publish', [BlogController::class, 'togglePublish'])->name('blogs.toggle-publish');
    Route::post('blogs/upload-image', [BlogController::class, 'uploadImage'])
    ->name('blogs.upload-image');



    // User management
    Route::resource('users', RegisteredUserController::class)->except(['index']);

    // Booking management
    Route::resource('bookings', BookingController::class)->except(['store']);
    // DO NOT add any other /bookings route in this group!
});

// Bookings routes (for authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/properties/{property}/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/properties/{property}/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
});

require __DIR__.'/auth.php';