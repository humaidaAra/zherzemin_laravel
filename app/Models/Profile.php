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
        $articles = Profile::find($this->id)->articles()->get();
        $events = Profile::find($this->id)->events()->get();
        $exhibitions = Profile::find($this->id)->exhibitions()->get();
        return ['articles'=>$articles,
        'events'=> $events, 
        'exhibitions'=>$exhibitions];
    }
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_profile');
    }
    public function events()
    {
        return $this->belongsToMany(Event::class, 'events_profile');
    }
    public function exhibitions()
    {
        return $this->belongsToMany(Exhibition::class, 'exhibitions_profile');
    }

}
