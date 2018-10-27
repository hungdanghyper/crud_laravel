@extends('layout.master')
@section('content')
    @if($postId)    {{-- if exist post --}}
    <h2>{{$postId->title}}</h2>     {{-- Title --}}
    <p>{{$postId->created_at}}</p>  {{-- time --}}
    <div>
        <p>{{$postId->content}}</p> {{-- Content --}}
    <div>
    @else
        <h3>Nothing to display</h3>
    @endif
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
@endsection