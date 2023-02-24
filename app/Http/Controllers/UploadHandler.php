<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UploadHandler extends Controller
{
    public function article_media_store(Request $request)
    {
        
        $newly_added_cover_path ='images/ariticleimages/'.Carbon::now()->toDateString() . '' .$request->file('img')->hashName();
        Storage::disk('public')->put($newly_added_cover_path, file_get_contents($request->img));
        // $url = Storage::url($newly_added_cover_path);
        $url = asset(Storage::url($newly_added_cover_path));
        return response()->json(['location'=>$url]);
    }
    public function event_media_store(Request $request)
    {

    }
    public function exhibition_media_store(Request $request)
    {

    }
    public function request_maker()
    {
        return view('dummycreate');
    }
}
