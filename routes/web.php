<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SponserController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UploadHandler;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'login']);
});

Route::get('/', function () {
    return "ur visitor";
});


// Route::prefix('upload/media')->group(function () {


//     Route::get('article', [UploadHandler::class, 'request_maker']);


//     Route::post('article', [UploadHandler::class, 'article_media_store'])->name('articleUpload');
//     Route::post('event', [UploadHandler::class, 'event_media_store']);
//     Route::post('exhibition', [UploadHandler::class, 'exhibition_media_store']);
// });


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
    
    Route::resource('articles', ArticleController::class);
    Route::resource('events', EventController::class);
    Route::resource('exhibitions', ExhibitionController::class);
    Route::resource('profiles', ProfileController::class);
    Route::resource('tags', TagController::class);
    Route::resource('sponsers', SponserController::class);
});


Route::fallback(function () {
    return view("404");
});
