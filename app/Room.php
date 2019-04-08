<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
   
    protected $guarded = [];
    
    public function roomrates() {
        return $this->hasMany('App\RoomRate');
    }

    public function type() {
        return $this->belongsTo('App\RoomType','room_type')->withDefault();
    }
    public function item() {
        return $this->hasMany('App\RoomAmenities')->withDefault();
    }

    public function user() {
        return $this->belongsTo('App\User')->withDefault();
    }
}
