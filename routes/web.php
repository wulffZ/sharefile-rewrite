<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\HomeController;


// Default routes
Route::group(["middleware" => ["auth", "verified"]], function() {
    Route::get('/', [HomeController::class, "index"])->name('index');
});

// Category routes
Route::group(["prefix" => "category", "middleware" => ["auth", "verified"]], function() {
    Route::get('/videos', [VideoController::class, "videos"])->name('category.videos');
    Route::get('/games', [GameController::class, "games"])->name('category.games');
    Route::get('/software', [SoftwareController::class, "software"])->name('category.software');
    Route::get('/music', [MusicController::class, "music"])->name('category.music');
    Route::get('/other', [OtherController::class, "other"])->name('category.other');
});

// Email verification
Route::get("/email/verify", [EmailVerificationPromptController::class, "prompt"])->middleware( 'auth')->name("verification.notice");

Route::get("/email/verify/{id}/{hash}", [EmailVerificationNotificationController::class, "fulfill"])->middleware( 'auth', 'signed')->name("verification.verify");

require __DIR__.'/auth.php';
