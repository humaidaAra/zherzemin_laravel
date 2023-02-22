<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExhibitionRequest;
use App\Models\Exhibition;
use App\Models\Profile;
use App\Models\Sponser;
use App\Models\Tag;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExhibitionController extends Controller
{
    public function index()
    {
        $exhibitions = Exhibition::get();
        return response(view('exhibitions.index', compact('exhibitions')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::get();
        $sponsers = Sponser::get();
        $profiles = Profile::get();
        return response(view('exhibitions.create')->with([
            'tags' => $tags,
            'sponsers' => $sponsers,
            'profiles' => $profiles
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExhibitionRequest $request)
    {
        try
        {
            $last_exhibition =  Exhibition::create($request->validated());
            if ($request->tags) 
            {
                    foreach($request->tags as $tf)
                    {
                        DB::table('exhibition_tag')->insert([
                            ['exhibition_id' => $last_exhibition->id, 'tag_id' => $tf]
                        ]);
                    }
            }
            if ($request->sponsers) 
            {
                    foreach($request->sponsers as $sp)
                    {
                        DB::table('exhibition_sponser')->insert([
                            ['exhibition_id'=> $last_exhibition->id, 'sponser_id'=>$sp]
                        ]);
                }
            }
            if ($request->profiles) 
            {
                    foreach($request->profiles as $pf)
                    {
                        DB::table('exhibition_profiles')->insert([
                            ['exhibition_id'=> $last_exhibition->id, 'profile_id'=>$pf]
                        ]);
                }
            }
            if ($request->cover) 
            {
                $newly_added_cover_path ='images/exhibitionimages/'.Carbon::now()->toDateString() . '' .$request->file('cover')->hashName();
                Storage::disk('public')->put($newly_added_cover_path, file_get_contents($request->cover)); 
                $url = Storage::url($newly_added_cover_path);
                $last_exhibition->cover = $url;
                $last_exhibition->update(['cover'=>$url]);
            }
            return response(redirect('/admin/exhibitions'));
        }
        catch (Exception $ex) 
        {
            dd($ex);
            // return response(redirect('/admin/articles')->withErrors('could not perform the action'));
        }
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
        $tags = Tag::get();
        $sponsers = Sponser::get();
        $profiles = Profile::get();
        $exhibition = Exhibition::find($id);
        return response(view('exhibitions.create')->with([
            'tags' => $tags,
            'sponsers' => $sponsers,
            'profiles' => $profiles,
            'exhibition'=> $exhibition
        ]));
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exhibition::find($id)->delete();
        return response(redirect('/admin/exhibitions'));
    }
}
