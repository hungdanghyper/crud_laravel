<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    
</head>
<body>
    <div class="container"> 
        <br>
        <div class="row" style="background-color:white">
            <div class="col-lg-3">
                <h1>Laravel</h1>
            </div>
            <div class="col-lg-1 mt-3">
                <a href="{{route('getcate')}}">Category</a>
            </div>
            <div class="col-lg-1 mt-3">
                <a href="{{route('gettype')}}">Type</a>
            </div>
            <div class="col-lg-1 mt-3">
                <a href="{{route('getpost')}}">Post</a>
            </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <div class="col-lg-2">
                            <a href="{{ url('/home') }}">Home</a>
                        </div>
                    @else
                        <div class="col-lg-2">
                            <a href="{{ route('login') }}">Đăng Nhập</a>
                        </div>
                        <div class="col-lg-2">
                            <a href="{{ route('register') }}">Đăng Kí</a>
                        </div>
                    @endauth
                </div>
            @endif
        </div><br>
        @yield('content')
    </div>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('script')
</body>
</html>