<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminBusinessController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminReviewController;


use Illuminate\Support\Facades\Route;



//Guests

//Home
Route::get('/',  [SiteController::class, 'cat_state'])->name('home');


//categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');


//search
Route::get('/browse',  [SiteController::class, 'browseBusinesses'])->name('browse');
Route::post('/browse',  [SiteController::class, 'browseBusinesses'])->name('browse');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Admin Routes
Route::get('/admin_dashboard', [AdminDashboardController::class, "index"])->middleware(['auth', 'verified'])->name('admin_dashboard');
Route::get('/admin_businesses', [AdminBusinessController::class, "index"])->middleware(['auth', 'verified'])->name('admin_businesses');
Route::post('/admin_businesses/{$id}', [AdminBusinessController::class, "toggleStatus"])->middleware(['auth', 'verified'])->name('business_status');

Route::get('/admin_reviews', [AdminReviewController::class, "index"])->middleware(['auth', 'verified'])->name('admin_reviews');




// Keep the old route for backward compatibility
Route::get('/users', [AdminUserController::class, 'index'])->middleware(['auth', 'verified'])->name('users');




Route::get('/super_admin/dashboard', function () {
    return view('super_admin.dashboard');
})->middleware(['auth', 'verified', 'super_admin'])->name('super_admin.dashboard');

Route::get('/business_owner/dashboard', function () {
    return view('bo_dashboard');
})->middleware(['auth', 'verified'])->name('bo_dashboard');

Route::get('/getlisted', [BusinessController::class, 'create'])->middleware(['auth', 'verified'])->name('get_listed');

Route::post('/getlisted', [BusinessController::class, 'store'])->middleware(['auth', 'verified'])->name('business.store');

Route::get('/get-lgas/{state}', [BusinessController::class, 'getLgas'])->middleware(['auth'])->name('get.lgas');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//business owner create listing
Route::get('/create_listing', [BusinessController::class, 'createListing'])->middleware(['auth', 'verified'])->name('create_listing');

Route::post('/create_listing', [BusinessController::class, 'storee'])->middleware(['auth', 'verified'])->name('business.storee');

//Business Owner View Businesses
Route::get('/my_businesses', [BusinessController::class, 'myBusinesses'])->middleware(['auth', 'verified'])->name('my_businesses');
Route::get('/my_businesses/{id}', [BusinessController::class, 'viewBusiness'])->middleware(['auth', 'verified'])->name('view_business');




//Business Owner Profile
Route::get('/business_owner/profile', [App\Http\Controllers\BusinessOwnerProfileController::class, 'edit'])->middleware(['auth', 'verified'])->name('bo_profile');

Route::post('/business_owner/profile', [App\Http\Controllers\BusinessOwnerProfileController::class, 'update'])->middleware(['auth', 'verified'])->name('bo_profile.update');

//Business Owner Edit Businesses
Route::get('/edit_business/{id}', [BusinessController::class, 'editBusiness'])->middleware(['auth', 'verified'])->name('edit_business');

Route::post('/edit_business/{id}', [BusinessController::class, 'updateBusiness'])->middleware(['auth', 'verified'])->name('business.updateBusiness');

//Business Owner Delete Business
Route::get('/delete_business/{id}', [BusinessController::class, 'deleteBusiness'])->middleware(['auth', 'verified'])->name('business.delete');

//Business Owner Delete Business
Route::delete('/delete_business/{id}', [BusinessController::class, 'deleteBusiness'])->middleware(['auth', 'verified'])->name('business.delete');

//View Business
Route::get('/view_business/{id}', [SiteController::class, 'view_business'])->name('view');





//Admin Route






require __DIR__.'/auth.php';
