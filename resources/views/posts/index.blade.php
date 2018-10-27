@extends('layout.master')
@section('content')
<div>
    @if(Session::has('success'))
        <div class="alert alert-success">
            <ul>      
                <li>{{Session::get('success')}}</li>
            </ul>
        </div>
    @endif
</div>            
<div class="jumbotron">
    <div class="row">
    {{-- Add new post --}}
        <div class="col-lg-2">
            <a href="{{route('createpost')}}">+ Add post</a>
        </div>
    </div>
    {{-- list posts --}}
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Summary</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ str_limit($post->content,60) }}
                        @if (strlen($post->content) > 60)
                        <a href="{{route('showpost',$post->id)}}" class="btn btn-info btn-sm">Read More</a>
                        @endif                           
                    </td>
                    <td>{{$post->types->categories->name}}</td>
                    <td>{{$post->types->name}}</td>
                    <td>
                        <a class="btn btn-success" href="{{route('editpost',$post->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{route('destroypost',$post->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach                      
            </tbody>
        </table>
        {{-- url !== post/getpost ==> display <a> All post </a>  --}} 
        @if(Request::url() !== route('getpost'))
             <a href="{{route('getpost')}}">All post</a>
        @endif
    </div>
</div>
{{-- Back --}}
<a href="{{route('gettype')}}" class="btn btn-primary">Back</a>
{{-- pagination --}}
{{ $posts->links() }}            
@endsection