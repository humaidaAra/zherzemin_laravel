<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =
    [
        'name_en',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tag');
    }
    public function events()
    {
        return $this->belongsToMany(Event::class, 'article_tag');
    }
    public function exhibitions()
    {
        return $this->belongsToMany(Exhibition::class, 'article_tag');
    }
}
