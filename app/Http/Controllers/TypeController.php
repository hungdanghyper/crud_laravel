<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Type;
use App\Category;
use Validator;

class TypeController extends Controller
{
    /*  Get Types */
    public function gettype()
    {   
        $types = Type::latest()->paginate(5);   /*  5 posts/page */
        return view('types.index',['types'=>$types])->with('i',(request()->input('page',1)-1)*5);
    }
    
    /*  Create Type */
    public function createtype()
    {
        $cates = Category::all();       /* get all cates */
        return view('types.action',['cates'=>$cates,'typeId'=>'']);
    }
    
    /*  Store Type */
    public function storetype(Request $request)
    {   
        /*  Validate requests */
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:types,name|max:255|min:5'
        ], [
            'name.required' => 'Name is required',
            'name.unique' => 'Name is existed',
            'name.max' => 'Name is too long',
            'name.min' => 'Name is too short',
            ]);
            if($validator->fails()){
                return  redirect('types/create')->withErrors($validator)->withInput($request->all());
            }
            else{
                $types = new Type();
                $types->name = $request->name;
                $types->id_category = $request->category;
                $types->save();
                return redirect('type/gettype')->with('success','A new type has been  added');
            }
        }
        
        
        /*  Show Type */
        public function showtype($id)
        {
            $posts = Post::where('id_type',$id)->paginate(5);
            return view('posts.index',['posts'=>$posts])->with('i',(request()->input('page',1)-1)*5);
        }
        
        /*  Edit Type */
        public function edittype($id)
        {
            $cates = Category::all();
            $typeId = Type::find($id);
            if($typeId)
            return view('types.action',['typeId'=>$typeId,'cates'=>$cates]);
            else
            return view('notfound');
        }
        
        /*  Update Type */
        public function updatetype(Request $request, $id)
        {
            $typeId = Type::find($id);
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:types,name|max:255|min:5'
            ], [
                'name.required' => 'Name is required',
                'name.unique' => 'Name is existed',
                'name.max' => 'Name is too long',
                'name.min' => 'Name is too short',
                ]);
                if($validator->fails())
                {
                    return redirect(route('edittype',$id))
                    ->withErrors($validator)
                    ->withInput($request->input());
                }
                else
                {
                    if($typeId){
                        $typeId->name = $request->name;
                        $typeId->id_category = $request->category;
                        $typeId->save();
                    }
                    return redirect('type/gettype')->with('success','Edit successfully');
                }
            }
            
            
            /*   Destroy Type */
            public function destroytype($id)
            {
                $typeId = Type::find($id);
                $typeId->delete();
                return redirect('type/gettype')->with('success','Delete Successfully');
            }
            
        }
        