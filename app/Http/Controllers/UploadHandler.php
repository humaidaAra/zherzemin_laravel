<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class UploadHandler extends Controller
{
    public function article_media_store(Request $request)
    {
        try {

            $now = Carbon::now()->toDateString();
            $newly_added_cover_path = 'images/ariticleimages/' . $now . $request->file('img')->hashName();
            Storage::disk('public')->put($newly_added_cover_path, file_get_contents($request->img));
            $url = env('APP_URL').Storage::url($newly_added_cover_path);
            DB::table('uploaded_image_path')->insert([
                'relative_path' => $newly_added_cover_path,
                'remote_path' => $url
            ]);
            return response()->json(['location' => $url]);
        } catch (Exception $ex) {
            return response('Internal Server Error', 500);
        }
    }
    public function event_media_store(Request $request)
    {
        try {
            $newly_added_cover_path = 'images/eventimages/' . Carbon::now()->toDateString() . '' . $request->file('img')->hashName();
            Storage::disk('public')->put($newly_added_cover_path, file_get_contents($request->img));
            $url = env('APP_URL').Storage::url($newly_added_cover_path);
            DB::table('uploaded_image_path')->insert([
                'relative_path' => $newly_added_cover_path,
                'remote_path' => $url
            ]);
            return response()->json(['location' => $url]);
        } catch (Exception $ex) {
            return response('Internal Server Error', 500);
        }
    }
    public function exhibition_media_store(Request $request)
    {
        try {
            $newly_added_cover_path = 'images/exhibitionimages/' . Carbon::now()->toDateString() . '' . $request->file('img')->hashName();
            Storage::disk('public')->put($newly_added_cover_path, file_get_contents($request->img));
            $url = env('APP_URL').Storage::url($newly_added_cover_path);
            DB::table('uploaded_image_path')->insert([
                'relative_path' => $newly_added_cover_path,
                'remote_path' => $url
            ]);
            return response()->json(['location' => $url]);
        } catch (Exception $ex) {
            return response('Internal Server Error', 500);
        }
    }

    public function delete_media(Request $request)
    {
        try {
            if ($request->img) {
                $local_url = DB::table('uploaded_image_path')->where('remote_path', '=', $request->img)->get('relative_path');
                if (Storage::disk('public')->exists($local_url[0]->relative_path)) {
                    Storage::disk('public')->delete($local_url[0]->relative_path);
                }
                return response('', 200);
            }
        } catch (Exception $ex) {
            return response('Internal Server Error', 500);
        }
    }
}
/**
 * 
 * (?::(?![7-9]\d\d\d\d)(?!6[6-9]\d\d\d)(?!65[6-9]\d\d)(?!655[4-9]\d)(?!6553[6-9])(?!0+)(?<Port>\d{1,5}))?
 */
