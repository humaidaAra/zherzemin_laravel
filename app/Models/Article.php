<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title_en',
        'title_ku',
        'title_ar',
        'description_en',
        'description_ku',
        'description_ar',
        'body_en',
        'body_ku',
        'body_ar',
        'user_id',
        'featured',
        'cover'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag');
    }
    public function sponsers()
    {
        return $this->belongsToMany(Sponser::class, 'article_sponser');
    }
    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'article_profile');
    }
}
