<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;


// Default routes
Route::group(["middleware" => ["auth", "verified"]], function() {
    Route::get('/', [HomeController::class, "index"])->name('home.index');
});

// Email verification
Route::get("/email/verify", [EmailVerificationPromptController::class, "prompt"])->middleware( 'auth')->name("verification.notice");

Route::get("/email/verify/{id}/{hash}", [EmailVerificationNotificationController::class, "fulfill"])->middleware( 'auth', 'signed')->name("verification.verify");

require __DIR__.'/auth.php';
