<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public $timestamps = false;

    protected $table = 'modules';
  
    protected $fillable = array('parent_id','title','url','order','icon');
  
    public function parent()
    {
      return $this->belongsTo('App\Module', 'parent_id');
    } 
  
    public function children()
    {
      return $this->hasMany('App\Module', 'parent_id');
    }
}
