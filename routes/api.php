<?php

use App\Http\Controllers\UploadHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('upload/media')->group(function () {

    
    // Route::get('article', [UploadHandler::class, 'request_maker']);


    Route::post('article', [UploadHandler::class, 'article_media_store'])->name('articleUpload');
    Route::post('event', [UploadHandler::class, 'event_media_store']);
    Route::post('exhibition', [UploadHandler::class, 'exhibition_media_store']);
});