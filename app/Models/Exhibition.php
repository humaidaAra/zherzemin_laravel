<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Exhibition extends Model
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
        'cover',
        'start_date'
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tags($exhibition_id)
    {
        $exhibition_tags = DB::table('exhibition_tag')->where('exhibition_id', '=', $exhibition_id)->get();
        return DB::table('exhibition_tag')->where('exhibition_id', '=', $exhibition_id)->get();
    }
    public function sponsers($exhibition_id)
    {
        $exhibition_sponser = DB::table('exhibition_sponser')->where('exhibition_id', '=', $exhibition_id)->get();
        return DB::table('exhibition_sponser')->where('exhibition_id', '=', $exhibition_id)->get();
    }

    public function profiles($exhibition_id)
    {
        $exhibition_profile = DB::table('exhibition_profile')->where('exhibition_id', '=', $exhibition_id)->get();
        return DB::table('exhibition_profile')->where('exhibition_id', '=', $exhibition_id)->get();
    }
}
