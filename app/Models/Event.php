<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Event extends Model
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
    public function tags($event_id)
    {
        // $event_tags = DB::table('event_tag')->where('event_id', '=', $event_id)->get();
        return DB::table('event_tag')->where('event_id', '=', $event_id)->get();
    }
    public function sponsers($event_id)
    {
        // $event_sponser = DB::table('event_sponser')->where('event_id', '=', $event_id)->get();
        return DB::table('event_sponser')->where('event_id', '=', $event_id)->get();
    }

    public function profiles($event_id)
    {
        // $event_profile = DB::table('event_profile')->where('event_id', '=', $event_id)->get();
        return DB::table('event_profile')->where('event_id', '=', $event_id)->get();
    }
}
