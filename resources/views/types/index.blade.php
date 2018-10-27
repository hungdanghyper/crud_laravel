@extends('layout.master')
@section('content')

    <h1>Type of post</h1><br>
    @if(Session::has('success'))
        <div class="alert alert-success">
                {{Session::get('success')}}        
        </div>
    @endif
        {{-- Add new Type --}}
    <div>
        <a href="{{route('createtype')}}">+ Add Type</a>
    </div>
        {{-- List Types --}}
    <table class="table">
        <thead>
            <th>No.</th>
            <th>Name</th>
            <th>Category</th>
            <th>Created_at</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($types as $type)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$type->name}}</td>  
                <td>{{$type->categories->name}}</td>
                <td>{{$type->created_at}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('showtype',$type->id)}}">Show</a>  {{-- get types by id --}}
                    <a class="btn btn-success" href="{{route('edittype',$type->id)}}">Edit</a>   {{-- edit type by id --}}
                    <a class="btn btn-danger" href="{{route('destroytype',$type->id)}}">Delete</a>  {{-- destroy type by id --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- back --}}
    <a href="{{route('getcate')}}" class="mr-5">Back</a>
    {{-- show or hide <a> ? --}}
    @if(Request::url() !== route('getpost'))
        <a href="{{route('gettype')}}">All post</a>
    @endif
    <br><div>
        {{$types->links()}}
    </div>
@endsection