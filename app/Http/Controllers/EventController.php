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

    public function store(EventRequest $request)
    {
        try
        {
            $last_event =  Event::create($request->validated());
            if ($request->tags) {
                $last_event->tags()->attach($request->tags);
            }
            if ($request->sponsers) {
                $last_event->sponsers()->attach($request->sponsers);
               
            }
            if ($request->profiles) {
                $last_event->profiles()->attach($request->profiles);
            }

            if ($request->cover) 
            {
                $newly_added_cover_path ='images/eventimages/'.Carbon::now()->toDateString() . '' .$request->file('cover')->hashName();
                Storage::disk('public')->put($newly_added_cover_path, file_get_contents($request->cover)); 
                $url = Storage::url($newly_added_cover_path);
                $last_event->update(['cover'=>$url]);
            }
            return redirect('/admin/events');
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

        $event = Event::find($id);
        $event_tags = array_map(
            function ($element) {
                return $element['id'];
            },
            $event->tags()->get()->toArray()
        );
        $event_sponsers = array_map(
            function ($element) {
                return $element['id'];
            },
            $event->sponsers()->get()->toArray()
        );
        $event_profiles = array_map(
            function ($element) {
                return $element['id'];
            },
            $event->profiles()->get()->toArray()
        );


        return view('events.edit')->with([
            'event' => $event,
            'event_tags' => $event_tags,
            'event_sponsers' => $event_sponsers,
            'event_profiles' => $event_profiles,
            'tags' => $tags,
            'sponsers' => $sponsers,
            'profiles' => $profiles
        ]);
    }
    public function update(EventRequest $request, $id)
    {
        try {
            
            $event = Event::find($id);
            $event->update($request->validated());
            if ($request->tags) {
                $event->tags()->sync($request->tags);
            }
            if ($request->sponsers) {
                $event->sponsers()->sync($request->sponsers);
            }
            if ($request->profiles) {
                $event->profiles()->sync($request->profiles);
            }

            if ($request->cover) {
                $newly_added_cover_path = 'images/eventimages/' . Carbon::now()->toDateString() . '' . $request->file('cover')->hashName();
                Storage::disk('public')->put($newly_added_cover_path, file_get_contents($request->cover));
                $url = Storage::url($newly_added_cover_path);
                $event->update(['cover' => $url]);
            }
            return redirect('/admin/events');
        } catch (Exception $ex) {
            dd($ex);
            // return redirect('/admin/articles')->withErrors('could not perform the action');
        }
    }
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->tags()->detach();
        $event->sponsers()->detach();
        $event->profiles()->detach();
        $event->delete();

        return redirect('/admin/events');
    }
}
