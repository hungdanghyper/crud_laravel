<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   
    protected $table = "Posts";
    
    public function types()     
    {
        return $this->belongsTo('App\Type', 'id_type', 'id');
    }
    
}
