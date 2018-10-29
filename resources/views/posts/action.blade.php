@extends('layout.master')
@section('content')
@if($postId)  
<h1>Edit Post</h1>
@else
<h1>Add Post</h1>
@endif
<br>

@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
</br>
{{-- Edit post --}}
@if($postId)    
<form method="post" action="{{route('updatepost',$postId->id)}}" enctype="multipart/form-data">
    @csrf
        {{-- Title post --}}
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" value="{{ $postId->title }}">
    </div>
        {{-- Content post --}}
    <div class="form-group">
        <label>Content</label>
        <textarea class="form-control" type="text" rows="8" name="content">{{ $postId->content }}</textarea>
    </div>

        {{-- Type post --}}
    <div class="form-group">
        <label>Type</label>
        <select name="type">
            @if($types)
            @foreach ($types as $type)
            <option @if($type->id==$postId->id_type){{"selected"}} @endif value="{{$type->id}}">{{$type->name}}</option>
            @endforeach
            @endif
        </select>
    </div>
       
    <div class="form-group">
        <a class="btn btn-success" href="{{route('getpost')}}">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@else   {{-- Add Post --}}
<form method="post" action="{{route('storepost')}}" enctype="multipart/form-data">
    @csrf
     {{-- ADD Title --}}
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
    </div>
        {{-- Add Content --}}
    <div class="form-group">
        <label>Content</label>
        <textarea class="form-control" rows="8" name="content" value="{{ old('content') }}"></textarea>
    </div>
        {{--  Add Type --}}
    <div class="form-group">
        <label>Type</label>
        <select name="type">
            @if($types)
            @foreach ($types as $type)
            <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach
            @endif
        </select>
    </div>
     {{-- Add Category --}}
    <div class="form-group">
        <label>Category</label>
        <select name="category">
            @if($cates)
            @foreach ($cates as $cate)
            <option value="{{$cate->id}}">{{$cate->name}}</option>
            @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <a class="btn btn-success" href="{{route('getpost')}}">Back</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endif

@endsection