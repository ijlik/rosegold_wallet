@extends('layouts.app')
@section('content')
    <h3>Account settings</h3>
    @if(isset($ok))
        <strong style="color: limegreen;">Password Changed Successfully</strong>
        <br>
        <br>
    @endif
    <strong>Change password:</strong>
    <br>
    <br>
    <form name="changepass" method="post" action="/setting" onsubmit="document.getElementById('btn-password').type = 'button';">
        @csrf
        Current password:
        <br>
        <input class="txt" type="password" name="current_password" size="30" required>
        <br>
        <br>
        New password:
        <br>
        <input class="txt" type="password" name="password" size="30" required>
        <br>
        Repeat new password:
        <br>
        <input class="txt" type="password" name="password_confirmation" size="30" required>
        <br>
        <br>
        <input type="submit" class="buttn" value="Change password">
    </form>
    <br>
    <br>
    @if(is_null(auth()->user()->pin) || auth()->user()->pin == '')
    <strong>Add a transaction PIN for additional security:</strong><br><br>

    <form name="addpin" method="post" action="/setting/pin" onsubmit="document.getElementById('btn-pin').type = 'button';">
        @csrf
        PIN (5 characters):
        <input onkeyup="check(1)" id="pin1" class="txt" type="text" autocomplete="off" name="pinn1" size="5" min="5" max="5" required>
        Repeat PIN:
        <input onkeyup="check(2)" id="pin2" class="txt" type="text" autocomplete="off" name="pinn2" size="5" min="5" max="5" required>
        <br>
        <br>
        <strong>
            <font color="RED">
                You will have to enter the PIN each time you are sending ethereums.
                <br>
                Please write it down at a secure place, there is no recovery option if you lose it.
            </font>
        </strong>
        <br>
        <br>
        <input id="btn-pin" type="submit" class="buttn" value="Add transaction PIN">
    </form>
    <script>
        function check(id) {
            if(id == 1){
                var pin1 = document.getElementById('pin1').value;
                if(pin1.length >= 5){
                    document.getElementById('pin1').value = pin1.substring(0, 5);
                }
            } else {
                var pin2 = document.getElementById('pin2').value;
                if(pin2.length >= 5){
                    document.getElementById('pin2').value = pin2.substring(0, 5);
                }
            }
        }
    </script>
    @else
        <strong style="color: limegreen">Pin already set</strong>
        <br>
        <br>
        <strong>
            <font color="RED">
                You will have to enter the PIN each time you are sending ethereums.
                <br>
                Please write it down at a secure place, there is no recovery option if you lose it.
            </font>
        </strong>
    @endif
    <br>
    <br>
@stop
