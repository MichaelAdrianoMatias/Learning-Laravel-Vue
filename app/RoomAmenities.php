<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomAmenities extends Model
{
    public function room() {
        return $this->belongsTo('App\Room');
    }
    public function items() {
        return $this->belongsTo('App\Amenities');
    }
  
    public function amenities() {
        return $this->hasMany('App\Amenities');
    }

  
}
