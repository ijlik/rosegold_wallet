<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password - HLOB COIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="/landing-assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="/landing-assets/css/magnific-popup.css">
    <link type="text/css" rel="stylesheet" href="/landing-assets/css/jquery.selectBox.css">
    <link type="text/css" rel="stylesheet" href="/landing-assets/css/rangeslider.css">
    <link type="text/css" rel="stylesheet" href="/landing-assets/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="/landing-assets/css/jquery.mCustomScrollbar.css">
    <link type="text/css" rel="stylesheet" href="/landing-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="/landing-assets/fonts/flaticon/font/flaticon.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="/landing-assets/img/favicon.png" type="image/png" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="/landing-assets/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="/landing-assets/css/skins/default.css">

</head>
<body id="top">

<!-- Contact section start -->
<div class="contact-section overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Logo -->
                        <a href="">
                            <img src="/landing-assets/img/logos/black-logo.png" alt="logo">
                        </a>
                        <!-- Name -->
                        <h3>Reset your password</h3>
                    @if(isset($message))
                        <?php echo '<script> swal("'.$message.'", "All Done!", "'.$type.'");</script>'; ?>
                    @endif
                    @if ($errors == false)
                        <?php echo '<script> swal("'.$messages.'", "Try Again!", "error");</script>'; ?>
                    @endif
                    <!-- Form start -->
                        <form id="form-req-password" method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <input id="email" type="email" class="input-text form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" placeholder="Email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="input-text form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="New Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input id="password-confirm" type="password" class="input-text form-control" name="password_confirmation" placeholder="Confirm New Password" required>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" onclick="event.preventDefault(); document.getElementById('form-req-password').submit();" class="btn-md btn-block btn btn-color">Reset Password</button>
                            </div>
                        </form>
                        <!-- Social List -->
                        {{--<ul class="social-list clearfix">--}}
                        {{--<li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>--}}
                        {{--<li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>--}}
                        {{--<li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>--}}
                        {{--<li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>--}}
                        {{--</ul>--}}
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>Already a member? <a href="{{ route('login') }}">Login here</a></span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Contact section end -->

<!-- Full Page Search -->
<div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="#">
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="button" class="btn btn-sm btn-color">Search</button>
    </form>
</div>

<!-- External JS libraries -->
<script src="/landing-assets/js/jquery-2.2.0.min.js"></script>
<script src="/landing-assets/js/popper.min.js"></script>
<script src="/landing-assets/js/bootstrap.min.js"></script>
<script src="/landing-assets/js/jquery.selectBox.js"></script>
<script src="/landing-assets/js/rangeslider.js"></script>
<script src="/landing-assets/js/jquery.magnific-popup.min.js"></script>
<script src="/landing-assets/js/jquery.filterizr.js"></script>
<script src="/landing-assets/js/wow.min.js"></script>
<script src="/landing-assets/js/backstretch.js"></script>
<script src="/landing-assets/js/jquery.countdown.js"></script>
<script src="/landing-assets/js/jquery.scrollUp.js"></script>
<script src="/landing-assets/js/particles.min.js"></script>
<script src="/landing-assets/js/typed.min.js"></script>
<script src="/landing-assets/js/jquery.mb.YTPlayer.js"></script>
<script src="/landing-assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/landing-assets/js/ie-emulation-modes-warning.js"></script>
<!-- Custom JS Script -->
<script  src="/landing-assets/js/app.js"></script>
</body>
</html>
