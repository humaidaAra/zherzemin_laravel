<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
        [
            'name',
            'image',
            'description',
            'socialmedias',
        ];

    public function contributions()
    {
        $articles = Profile::find($this->id)->articles();
        $events = Profile::find($this->id)->events();
        $exhibitions = Profile::find($this->id)->exhibitions();
        return ['articles'=>$articles,
        'events'=> $events, 
        'exhibitions'=>$exhibitions];
    }
    public function articles()
    {
        $article_profiles = DB::table('article_profile')->select('article_id')->where('profile_id', '=', $this->id)->get();
    
        $articles = [];
        foreach($article_profiles as $record)
        {
            array_push($articles, Article::find($record->article_id));
        } 
        return $articles;
    }
    public function events()
    {
        $event_profiles = DB::table('event_profile')->select('event_id')->where('profile_id', '=', $this->id)->get();
    
        $events = [];
        foreach($event_profiles as $record)
        {
            array_push($events, Event::find($record->event_id));
        } 
        return $events;
    }
    public function exhibitions()
    {
        $exhibition_profiles = DB::table('exhibition_profile')->select('exhibition_id')->where('profile_id', '=', $this->id)->get();
    
        $exhibitions = [];
        foreach($exhibition_profiles as $record)
        {
            array_push($exhibitions, Exhibition::find($record->exhibition_id));
        } 
        return $exhibitions;
    }

}
