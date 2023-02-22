<?php

namespace App\Models;

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
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tags($article_id)
    {
        // $article_tags = DB::table('article_tag')->where('article_id', '=', $article_id)->get();
        return DB::table('article_tag')->where('article_id', '=', $article_id)->get();
    }
    public function sponsers($article_id)
    {
        // $article_sponser = DB::table('article_sponser')->where('article_id', '=', $article_id)->get();
        return DB::table('article_sponser')->where('article_id', '=', $article_id)->get();
    }

    public function profiles($article_id)
    {
        // $article_profile = DB::table('article_profile')->where('article_id', '=', $article_id)->get();
        return DB::table('article_profile')->where('article_id', '=', $article_id)->get();
    }
}
