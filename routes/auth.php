<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminBusinessController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\SuperAdminController;




use App\Http\Controllers\ReviewController;




/*
|--------------------------------------------------------------------------
| Guest Routes (unauthenticated users)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes (verified users)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');


    Route::post('/reviews', [ReviewController::class, 'store'])->name('review');

    Route::get('/manage-admin', [SuperAdminController::class, 'index'])->name('admin.manage_admin');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (admin or super_admin role)
|--------------------------------------------------------------------------
|
| These routes are prefixed with /admin and require either admin
| or super_admin role via the 'role:admin,super_admin' middleware.
|
*/
Route::prefix('admin')
    ->middleware(['auth', 'role:admin,super_admin'])
    ->group(function () {

        // Admin dashboard
        Route::get('/dashboard',
            [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');

        // Resource controllers for admin management
        Route::resource('users', AdminUserController::class);
        Route::patch('users/{user}/toggle-status', [AdminUserController::class, 'toggleStatus'])->name('admin.users.toggle-status');
        Route::resource('businesses', AdminBusinessController::class);
        Route::patch('businesses/{business}/toggle-status', [AdminBusinessController::class, 'toggleStatus'])->name('admin.business.toggle-status');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('reports', AdminReportController::class);
        Route::resource('reviews', AdminReviewController::class);
        Route::patch('reviews/{review}/approve', [AdminReviewController::class, 'approve'])->name('admin.reviews.approve');
        Route::patch('reviews/{review}/reject', [AdminReviewController::class, 'reject'])->name('admin.reviews.reject');
        Route::patch('reviews/{review}/destroy', [AdminReviewController::class, 'destroy'])->name('admin.reviews.destroy');
        Route::patch('admins/{id}/update', [SuperAdminController::class, 'update'])->name('admin.admins.update');

        // Custom route: verify a business (PATCH /admin/businesses/{id}/verify)
        Route::patch('businesses/{business}/verify',
            [AdminBusinessController::class, 'verify'])
            ->name('admin.businesses.verify');

    });

/*
|--------------------------------------------------------------------------
| Super Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('super-admin')
    ->middleware(['auth', 'role:super_admin'])
    ->group(function () {

        Route::resource(
            'admins',
            SuperAdminController::class
        );

    });
