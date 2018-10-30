@extends('layout.master')
@section('title','Login')
@section('content')
<div class="login-page">
    <div class="form">
        <form class="register-form">
            @csrf
            <input type="text" placeholder="name" name="username"/>
            <input type="password" placeholder="password" name="password"/>
            <input type="text" placeholder="email address"/>
            <button>create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        <form class="login-form" action="{{route('postlogin')}}" method="POST">
            @csrf
            <input type="text" name="email" placeholder="email"/>
            <input type="password" name="password" placeholder="password"/>
            <button type="submit">login</button>
            <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>
    </div>
</div>
@section('script')
<script>
    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
</script>  
@endsection
@endsection