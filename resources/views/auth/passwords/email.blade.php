@extends('layouts.auth')
@section('content')
    <div class="row no-gutters login-row">
        <div class="col align-self-center px-3 text-center">
            <br>
            <img src="/img/logo-header.png" alt="logo" class="logo-small">
            <form action="{{ route('password.email') }}" method="POST" id="form-login" class="form-signin mt-3 ">
                @csrf
                <div class="form-group">
                    <input type="text" name="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email" required autofocus>
                </div>

                <button type="submit" class="btn btn-default btn-lg btn-rounded shadow btn-block">Send Me Email</button>
            </form>
        </div>
    </div>
    @if(isset($message))
        <?php echo '<script> swal("'.$message.'", "All Done!", "'.$type.'");</script>'; ?>
    @endif
    @if ($errors == false)
        <?php echo '<script> swal("'.$messages.'", "Try Again!", "error");</script>'; ?>
    @endif

    <!-- login buttons -->

@stop
@section('title')
    <title>Forgot Password - HLOB COIN</title>
@stop
