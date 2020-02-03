@extends('layouts.app')
@section('content')
    <form name="login" method="post" action="/login">
        @csrf
        <h3>Login to your account</h3>
{{--        <strong><font color="RED">You are now logged out.</font></strong><br><br>--}}
        Username:<br><input type="text" class="txt" name="identity" required size="30"><br>
        Password:<br><input type="password" class="txt" name="password" required size="30"><br><br>
        Please enter the captcha code:<br>
        <img src="/img/captcha.jpg" alt=""><br>
        <input type="text" class="txt" autocomplete="off" name="captcha" required size="20"><br><br>
        <input type="submit" class="buttn" value="Login">
    </form>
    <br>
    <a href="/register">Register a new account</a><br><br>
@stop
