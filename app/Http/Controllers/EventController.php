<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Profile;
use App\Models\Sponser;
use App\Models\Tag;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try 
        {
            $events = Event::get();
            return response(view('events.index', compact('events')));
        } 
        catch (Exception $ex) 
        {
            return view('404');
        }
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
        return view('events.create')->with([
                'tags' => $tags,
                'sponsers' => $sponsers,
                'profiles' => $profiles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        try
        {
            $last_event =  Event::create($request->validated());
            if ($request->tags) 
            {
                foreach($request->tags as $tags_found)
                {
                   
                        DB::table('event_tag')->insert([
                            ['event_id' => $last_event->id, 'tag_id' => $tags_found]
                        ]);
                }
            }
            if ($request->sponsers) 
            {
                foreach($request->sponsers as $found_sponsers)
                {
                    
                    DB::table('event_sponser')->insert([
                        ['event_id'=> $last_event->id, 'sponser_id'=>$found_sponsers]
                    ]);
                }
            }
            if ($request->profiles) 
            {
                foreach($request->profiles as $found_profiles)
                {
                    
                    DB::table('event_profile')->insert([
                        ['event_id'=> $last_event->id, 'profile_id'=>$found_profiles]
                    ]);
                }
            }


            if ($request->cover) 
            {
                $newly_added_cover_path ='images/eventimages/'.Carbon::now()->toDateString() . '' .$request->file('cover')->hashName();
                Storage::disk('public')->put($newly_added_cover_path, file_get_contents($request->cover)); 
                $url = Storage::url($newly_added_cover_path);
                $last_event->update(['cover'=>$url]);
            }
            return response(redirect('/admin/events'));
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect('/admin/events');
    }
}
