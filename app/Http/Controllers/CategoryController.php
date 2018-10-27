<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Type;
use App\Category;
use Validator;

class CategoryController extends Controller
{
    /*  Get all Cates */
    public function getcate()
    {
        $category = Category::latest()->paginate(5);
        return view('cates.index',['category'=>$category])->with('i',(request()->input('page',1)-1)*5);
    }
    
    /*  Create Cate */
    public function createcate()
    {
        return view('cates.action',['cates'=>'']);
    }
    
    
    /*  Store Cate */
    public function storecate(Request $request)
    {
        $rules = ['name'=>'required|unique:categories,name|max:225']   ;
        $messages = [
            'name.required'=>'Name is required',
            'name.unique' => 'Name is existed',
            'name.max' => 'Name is too long'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect('category/create')
            ->withInput($request->all())
            ->withErrors($validator) ;     
        }
        else{
            $cate = new Category();
            $cate->name = $request->name;
            $cate->save();
            return redirect('category/getcate')->with('success','Category has been successfully');    
        }
    }
    
    
    /*  Show Cate */
    public function showcate($id)
    {
        $cate = Category::find($id);
        $types = Type::where('id_category',$id)->paginate(5);
        return view('types.index',['types'=>$types])->with('i',(request()->input('page',1)-1)*5);
    }
    
    
    /*  Edit Cate */
    public function editcate($id)
    {
        $cate = Category::find($id);
        if($cate)
        return view('cates.action',['cates'=>$cate]);
        else
        return view('notfound');
        
    }
    
    /*  Update Cate */
    public function updatecate(Request $request, $id)
    {
        $cateId = Category::find($id);
        
        $validator = Validator::make($request->all(),[
            'name'=> 'required|unique:categories,name|max:255'
        ], [
            'name.required'=>'Name is required',
            'name.unique' => 'Name is existed',
            'name.max'=>'Name is too long'
            ]);
            /* if not valid */
            if($validator->fails())
            {
                return redirect(route('editcate',$id))
                ->withErrors($validator)
                ->withInput($request->input());
            }
            /* valid */
            else
            {
                if($cateId){
                    $cateId->name = $request->name;
                    $cateId->save();
                }
                return redirect('category/getcate')->with('success','Edit successfully');
            }
            
        }
        
        
        /*  Destroy Cate */
        public function destroycate($id)
        {
            $cateId = Category::find($id);
            if($cateId)
            $cateId->delete();
            return redirect('category/getcate')->with('success','Delete Successfully');
        }
        
    }
    