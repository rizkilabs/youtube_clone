<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];

    public function playlist()
    {
    	return $this->belongsTo(Playlist::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
