<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class RoomType extends Model
{
    protected $guarded = ['id'];
    public function rooms() {
        return $this->hasMany('App\Room');
    }

    public function rate() {
        return $this->hasMany('App\RoomRate');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
}