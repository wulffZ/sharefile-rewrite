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
use App\Http\Controllers\FileController;


//
Route::group(["middleware" => ["auth", "verified"]], function() {
    // General
    Route::get('/', [HomeController::class, "index"])->name('index');
    Route::get('/upload/{category}', [FileController::class, "upload"])->name('file.upload');
    Route::post('/upload/{category}', [FileController::class, "uploadPost"])->name('file.uploadPost');

    // Show routes
    Route::get('/{category}/{id}', [FileController::class, "show"])->name('file.show');

    // Categories
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
