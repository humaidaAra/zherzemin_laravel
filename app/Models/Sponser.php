<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sponser extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
        [
            'name',
            'url',
            'image'
        ];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_sponser');
    }
    public function events()
    {
        return $this->belongsToMany(Event::class, 'events_sponser');
    }
    public function exhibitions()
    {
        return $this->belongsToMany(Exhibition::class, 'exhibitions_sponser');
    }
}
