<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Post;
use App\Type;
use App\Category;
use Validator;

class PostController extends Controller
{
    /*  Get Posts*/
    public function getpost()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.index',['posts'=>$posts])->with('i',(request()->input('page',1)-1)*5);
    }
    
    /*  Create Post*/
    public function createpost()
    {
        $cates = Category::all();
        $types = Type::all();
        return view('posts.action',['postId'=>'','cates'=>$cates,'types'=>$types]);
    }
    
    /*  STORE Post */
    public function storepost(Request $request)
    {
        $rules = [
            'title' => 'required|unique:posts,title|max:255',
            'content' => 'required|min:10',
        ];
        $messages =[
            'title.required' => 'Title is required',
            'title.unique'=> 'Title is existed',
            'content.required' => 'Content is required',
            'title.max' => 'The title is too long',
            'content.min'=> 'Content is too short'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return  redirect('post/create')->withErrors($validator)->withInput($request->all());
        }
        else{
            $post = new Post();
            $post->title = $request->title;
            $post->id_type = $request->type;
            $post->content = $request->content;
            $post->save();
            return redirect('post/getpost')->with('success','Post has been  added');
        }
    }
    
    
    /*  Show Posts */
    public function showpost($id)
    {
        $postId = Post::find($id);
        if($postId)
        return view('posts.show',['postId'=>$postId]);
    }
    
    /*  Edit Posts */
    public function editpost($id)
    {
        $cates = Category::all();
        $types = Type::all();
        $postId = Post::find($id);
        if($postId)
        return view('posts.action',['postId'=>$postId,'cates'=>$cates,'types'=>$types]);
        else
        return view('notfound');
    }
    
    /*  Update Post */
    public function updatepost(Request $request, $id)
    {
        $postId = Post::find($id);
        $validator = Validator::make($request->all(), [
            'title' => [
                'required',
                'max:255',
                'min:5',
                Rule::unique('posts')->ignore($postId->id),
            ],
            'content' => 'required|min:10'
        ], [
            'title.required' => 'Title is required',
            'title.max' => 'Title is too long',
            'title.min' => 'Title is too short',
            'title.unique' => 'Title is existed',
            'content.required' => 'Content is required',
            'content.min' => 'Content is too short'
            ]);
            if($validator->fails())
            {
                return redirect(route('editpost',$id))
                ->withErrors($validator)
                ->withInput($request->input());
            }
            else
            {
                if($postId){
                    $postId->title = $request->title;
                    $postId->id_type = $request->type;
                    $postId->content = $request->content;
                    $postId->save();
                }
                return redirect('post/getpost')->with('success','Edit successfully');
            }
        }
        
        
        /*  Destroy Post */
        public function destroypost($id)
        {
            $postId = Post::find($id);
            if($postId)
            $postId->delete();
            return redirect('post/getpost')->with('success','Delete Successfully');
        }
        
    }
    