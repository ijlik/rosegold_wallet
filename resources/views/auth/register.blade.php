@extends('layouts.app')
@section('content')
    <form name="register" method="post" action="/register">
        @csrf
        <h3>Register a new account</h3>
        Username:<br><input type="text" class="txt" name="username" size="30" required><br><br>
        Password:<br><input type="password" class="txt" name="password" size="30" required><br>
        Repeat password:<br><input type="password" class="txt" name="password_confirmation" size="30" required><br><br>
        Please enter the captcha code:<br>
        <img src="/img/captcha2.jpg" alt=""><br>
        <input type="text" class="txt" autocomplete="off" name="captcha" size="20" required><br><br>
        <input type="submit" class="buttn" value="Register">
    </form>
    <br>
@stop

