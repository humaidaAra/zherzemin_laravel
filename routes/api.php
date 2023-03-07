<?php

use App\Http\Controllers\UploadHandler;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    Route::post('article', function (Request $request) {
        try {
            // $newly_added_cover_path = 'images/ariticleimages/' . Carbon::now()->toDateString() . '' . $request->file('img')->hashName();
            // Storage::disk('public')->put($newly_added_cover_path, $request->img);
            // $url = asset(Storage::url($newly_added_cover_path));
            // DB::table('uploaded_image_path')->insert([
            //     'relative_path' => $newly_added_cover_path,
            //     'remote_path' => $url
            // ]);
            dump($request->file('img')->hashName());
            dump($request->file('img'));
            // return response()->json(['location' => $url]);
        } catch (Exception $ex) {
            return response('Internal Server Error', 500);
        }
    });
    Route::post('event', [UploadHandler::class, 'event_media_store'])->name('eventMediaUpload');
    Route::post('exhibition', [UploadHandler::class, 'exhibition_media_store'])->name('exhibitionMediaUpload');
});
