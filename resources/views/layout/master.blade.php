<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    
</head>
<body>
    <div class="container"> 
        <br>
        <div class="row">
            <div class="col-lg-3">
                <h1>Laravel</h1>
            </div>
            <div class="col-lg-2">
                <a href="{{route('getcate')}}">Category</a>
            </div>
            <div class="col-lg-2">
                <a href="{{route('gettype')}}">Type</a>
            </div>
            <div class="col-lg-2">
                <a href="{{route('getpost')}}">Post</a>
            </div>
        </div><br>
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>