@extends('layout.master')
@section('content')
    @if($cates)
    <h1>Edit Category</h1>
    @else
    <h1>Add Category</h1>
    @endif
    <br>
    @if($errors->any())                             {{-- if has error --> noti --}}
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>  
                @endforeach
            </ul>
        </div>
    @endif
    @if($cates)                     
        {{-- Edit  Category --}}
        <form action="{{route('updatecate',$cates->id)}}" method="post">   {{--  post/update/:id --}}
            @csrf
            <label>Name</label>
            <input type="text" name="name" value="{{$cates->name}}" class="form-control"><br>
            <input type="hidden" name="id" value="{{$cates->id}}">
            <button type="submit" class="btn btn-success">Save</button>
            <a class="btn btn-danger" href="{{route('getcate')}}">Cancel</a>
        </form>
    @else   
        {{-- Add Category --}}
        <form action="{{url('category/store')}}" method="post">            {{-- category/store/ --}}
            @csrf
            <label>Name</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control"><br>
            <button type="submit" class="btn btn-success">+ Add</button>
            <a class="btn btn-danger" href="{{route('getcate')}}">Cancel</a>
        </form>
    @endif
@endsection