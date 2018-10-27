<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "Categories";
        public function types()
        {            
            return $this->hasMany('App\Type', 'id_category', 'id');    
        }
        public function posts()
        {
            return $this->hasManyThrough('App\Post', 'App\Type', 'id_category', 'id_type', 'id');
        }
        
}
