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

    public function store(ExhibitionRequest $request)
    {
        try
        {
            $last_exhibition =  Exhibition::create($request->validated());
            if ($request->tags) 
            {
                 $last_exhibition->tags()->attach($request->tags);
            }
            if ($request->sponsers) 
            {
                $last_exhibition->sponsers()->attach($request->sponsers);
            }
            if ($request->profiles) 
            {
                $last_exhibition->profiles()->attach($request->profiles);
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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tags = Tag::get();
        $sponsers = Sponser::get();
        $profiles = Profile::get();

        $exhibition = Exhibition::find($id);
        $exhibition_tags = array_map(
            function ($element) {
                return $element['id'];
            },
            $exhibition->tags()->get()->toArray()
        );
        $exhibition_sponsers = array_map(
            function ($element) {
                return $element['id'];
            },
            $exhibition->sponsers()->get()->toArray()
        );
        $exhibition_profiles = array_map(
            function ($element) {
                return $element['id'];
            },
            $exhibition->profiles()->get()->toArray()
        );


        return view('exhibitions.edit')->with([
            'exhibition' => $exhibition,
            'exhibition_tags' => $exhibition_tags,
            'exhibition_sponsers' => $exhibition_sponsers,
            'exhibition_profiles' => $exhibition_profiles,
            'tags' => $tags,
            'sponsers' => $sponsers,
            'profiles' => $profiles
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            
            $exhibition = Exhibition::find($id);
            $exhibition->update($request->validated());
            if ($request->tags) {
                $exhibition->tags()->sync($request->tags);
            }
            if ($request->sponsers) {
                $exhibition->sponsers()->sync($request->sponsers);
            }
            if ($request->profiles) {
                $exhibition->profiles()->sync($request->profiles);
            }

            if ($request->cover) {
                $newly_added_cover_path = 'images/exhibitionimages/' . Carbon::now()->toDateString() . '' . $request->file('cover')->hashName();
                Storage::disk('public')->put($newly_added_cover_path, file_get_contents($request->cover));
                $url = Storage::url($newly_added_cover_path);
                $exhibition->update(['cover' => $url]);
            }
            return redirect('/admin/exhibitions');
        } catch (Exception $ex) {
            dd($ex);
            // return redirect('/admin/articles')->withErrors('could not perform the action');
        }
    }

    public function destroy($id)
    {
        Exhibition::find($id)->delete();
        return response(redirect('/admin/exhibitions'));
    }
}
