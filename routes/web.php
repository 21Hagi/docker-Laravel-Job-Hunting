<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\GuestLoginController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::resource('company', CompanyController::class)
    ->middleware(['auth', 'verified']);

Route::resource('resume', ResumeController::class)
    ->only(['create', 'store', 'show'])
    ->middleware(['auth', 'verified']);

Route::resource('interview', InterviewController::class)
    ->except(['create', 'show'])
    ->middleware(['auth', 'verified']);

Route::prefix('interview')->controller(InterviewController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('/setting', 'setting')->name('interview.setting');
    Route::get('/create/{type}', 'create')->name('interview.create');
    Route::post('/orderListUpdate', 'orderListUpdate')->name('interview.listUpdate');
    Route::post('/setupUpdateOrCreate', 'setupUpdateOrCreate')->name('interview.setupUpdateOrCreate');
});

Route::middleware('guest')->group(function () {
    Route::post('/guest-login', [GuestLoginController::class, 'guest'])->name('guest.guestLogin');
});

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('rejectGuest')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

if (config('app.env') === 'production') {
    URL::forceScheme('https');
}

require __DIR__.'/auth.php';
