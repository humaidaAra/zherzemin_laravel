<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::get();

        return response(view('profiles.index', compact('profiles')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('profiles.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'max:60'],
            'image' => ['nullable'],
            'description' => ['required'],
            'socialmedias' => ['nullable']
        ]);
        $last_profile = Profile::create($validate);
        if ($request->image) 
        {
            $newly_added_cover_path ='images/profileimages/'.$last_profile->id."/".Carbon::now()->toDateString() . '' .$request->file('image')->hashName();
            Storage::disk('public')->put($newly_added_cover_path, file_get_contents($request->image)); 
            $url = Storage::url($newly_added_cover_path);
            $last_profile->image = $url;
            $last_profile->update(['image'=>$url]);
        }
        return redirect('/admin/profiles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profile::find($id)->delete();
        return redirect('/admin/profiles');
    }
}
