@extends('layout.master')
@section('content')
    <h1>Category</h1><br>

    {{-- if has 'success' ==> alert --}}
    @if(Session::has('success'))
        <div class="alert alert-success">
                {{Session::get('success')}}        
        </div>
    @endif

    {{-- Add new category --}}
    <div>
        <a href="{{route('createcate')}}">+ Add Category</a>
    </div>

    {{-- list category --}}
    <table class="table">
        <thead>
            <th>No.</th>
            <th>Name</th>
            <th>Created_at</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($category->all() as $cate)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$cate->name}}</td>
                <td>{{$cate->created_at}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('showcate',$cate->id)}}">Show</a>
                    <a class="btn btn-success" href="{{route('editcate',$cate->id)}}">Edit</a>
                    <a class="btn btn-danger" href="{{route('destroycate',$cate->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- pagination --}}
    <div>
        {{$category->links()}}
    </div>
@endsection