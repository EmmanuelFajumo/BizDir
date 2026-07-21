<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

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

  

//Business Owner Edit Businesses
Route::get('/edit_business/{id}', [BusinessController::class, 'editBusiness'])->middleware(['auth', 'verified'])->name('edit_business');

Route::post('/edit_business/{id}', [BusinessController::class, 'updateBusiness'])->middleware(['auth', 'verified'])->name('business.updateBusiness');

require __DIR__.'/auth.php';
