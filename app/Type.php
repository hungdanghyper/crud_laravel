<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = "Types";
    
    public function categories()
    {
        return $this->belongsTo('App\Category', 'id_category', 'id');
    } 

    public function posts()
    {
        return $this->hasMany('App\Post', 'id_type', 'id');
    }    
}
