<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatController;
use App\Http\Middleware\RoleMiddleware;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::middleware(RoleMiddleware::class . ':admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
// });
Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
Route::post('/chat/message', [ChatController::class, 'getMessage'])->name('chat.message');




Auth::routes(['verify'=>true]);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth', 'verified')->name('dashboard');

// Route::get('/dashboard', function () {
//  [DashboardController::class, 'index']);
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Email verification notice
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
// Email verification handler
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth', 'signed'])->name('verification.verify');
    
// Resend verification email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
require __DIR__.'/auth.php';
