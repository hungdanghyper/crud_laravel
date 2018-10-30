<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Type;
use App\Category;
use Validator;

class AjaxController extends Controller
{
    public function getType($idCategory){
        $types = Type::where('id_category',$idCategory)->get();
        foreach ($types as $type) {
            echo "<option value='".$type->id."'>".$type->name."</option>";
        }
    }
}