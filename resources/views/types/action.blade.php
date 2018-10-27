@extends('layout.master')
@section('content')
@if($typeId)            {{-- if has $typeId ==> Edit form --}}
<h1>Edit Type</h1>
@else
<h1>Add Type</h1>
@endif
<br>
{{-- exist error--}}
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
{{-- if exist $typeId ==> Edit Form --}}
@if($typeId)
<form method="post" action="{{route('updatetype',$typeId->id)}}" enctype="multipart/form-data">
    @csrf
    {{-- Type --}}
    <div class="form-group">
        <label>Type</label>
        <input type="text" class="form-control" name="name" value="{{ $typeId->name }}">
    </div><br>

    {{-- Category --}}
    <div class="form-group">
        <label>Category </label>
        <select name="category">
            @if($cates)
            @foreach ($cates as $cate)
            <option @if($cate->id==$typeId->id_category) {{"selected"}} @endif value="{{$cate->id}}">{{$cate->name}}</option>
            @endforeach
            @endif
        </select>
    </div>

    {{-- Actions --}}
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-danger" href="{{route('gettype')}}">Cancel</a>
    </div>
</form>

{{-- esle ==> Create Form --}}
@else
<form method="post" action="{{route('storetype')}}" enctype="multipart/form-data">
    @csrf

    {{-- Type --}}
    <div class="form-group">
        <label>Type</label>
        <input type="text" class="form-control" name="name" value="{{ old('title') }}">
    </div>

    {{-- Category --}}
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

    {{-- Actions --}}
    <div class="form-group">
        <a class="btn btn-success" href="{{route('gettype')}}">Back</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endif

@endsection