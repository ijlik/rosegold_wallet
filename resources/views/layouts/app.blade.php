<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="RoseWallet is a Web based Ethereum Wallet and Ethereum Laundry / Mixer, launder your Ethereums without a fee at RoseWallet. Anonymous Ethereum Web Wallet, Online Wallet">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <title>RoseWallet Anonymous and secure Ethereum Wallet and Ethereum Mixer, Laundry. Wash your Ethereums.</title>
    <style type="text/css">
        body {
            background-image: url("img/background.png");
            color:#00576A;
            margin:0;
            padding:0;
        }

        body,.buttn,.txt,textarea,#menu a {
            font:13px Verdana,Tahoma,sans-serif
        }

        div {
            position:relative
        }

        :focus {
            outline:none
        }

        ::-moz-focus-inner,img {
            border:0
        }

        #header {
            margin-bottom:20px
        }

        #header,#footer {
            -moz-box-shadow:0 9px 9px rgba(0,0,0,0.333);
            -webkit-box-shadow:0 9px 9px rgba(0,0,0,0.333);
            box-shadow:0 9px 9px rgba(0,0,0,0.333);
            background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAA8CAMAAAAT6xnzAAAALHRFWHRDcmVhdGlvbiBUaW1lAHNyaSAyMyBzaWogMjAxMyAxNzo1NjozNyArMDEwMFdJ7RQAAAAHdElNRQfdAR8LHzHHvyptAAAACXBIWXMAAAsSAAALEgHS3X78AAAABGdBTUEAALGPC/xhBQAAAJxQTFRFqqqqr6+vtLS0ubm5v7+/xMTEycnJz8/P1NTU1dXV1tbW19fX2NjY2dnZ2tra29vb3Nzc3d3d3t7e39/f4ODg4eHh4uLi4+Pj5OTk5eXl5ubm5+fn6Ojo6enp6urq6+vr7Ozs7e3t7u7u7+/v8PDw8fHx8vLy8/Pz9PT09fX19vb29/f3+Pj4+fn5+vr6+/v7/Pz8/f39/v7+////2PYswwAAAIlJREFUeNqdy1cCwQAUAMEliE70TvRe7383Z9g3/8NPI1C+Gh+Nt8ZL46nx0LhrkXLTuGpcNM4aJ42jFikHjb3GTmOrkWtstEhZa6w0lhoLjbnGTIuUqcZEY6wx0hhqDLRI6Wv0NDKNrkZHo61FSkujqdHQqGvUNKpapKQaFY2yRkkj0ShqFDS8P5RyMI6s/0BTAAAAAElFTkSuQmCC);
            border-width:0 5px;
            box-shadow:0 7px 9px rgba(0,0,0,0.5);
            height:60px;
            margin-left:-30px;
            width:872px
        }

        #logo {
            height:41px;
            left:223px;
            top:10px;
            width:226px
        }


        #main {
            background:#EEE;
            -moz-box-shadow:0 9px 9px rgba(0,0,0,0.333);
            -webkit-box-shadow:0 9px 9px rgba(0,0,0,0.333);
            box-shadow:0 9px 9px rgba(0,0,0,0.333);
            margin:25px auto 30px;
            padding:0 20px;
            width:822px
        }

        #menu {
            padding-bottom:27px
        }

        #menu a,.buttn {
            background:#00576A;
            border:0;
            color:#FFF;
            cursor:pointer;
            font-weight:700
        }

        #menu a,.buttn,.txt,textarea {
            -moz-box-shadow:0 2px 3px rgba(0,0,0,0.333);
            -webkit-box-shadow:0 2px 3px rgba(0,0,0,0.333);
            box-shadow:0 2px 3px rgba(0,0,0,0.333)
        }

        #menu a:focus {
            padding:6px 7px 6px 9px
        }

        .buttn {
            height:28px
        }

        .txt {
            background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAcCAMAAAAURxzFAAAALHRFWHRDcmVhdGlvbiBUaW1lAHV0byAyMiBzaWogMjAxMyAxMjoyNDoxOSArMDEwMM2m43AAAAAHdElNRQfdAR8LHiXEfs9RAAAACXBIWXMAAAsSAAALEgHS3X78AAAABGdBTUEAALGPC/xhBQAAAFRQTFRFqqqquLi4xsbG1NTU1dXV19fX2dnZ29vb3d3d3t7e4ODg4uLi5OTk5ubm6Ojo6enp6+vr7e3t7+/v8fHx8/Pz9PT09vb2+Pj4+vr6/Pz8/v7+////q9LoxgAAAEpJREFUeNqVwYcBQDAAAMFXoxMk2v57muHv+DRejUfj1rg0skbSODUOjV0jamwaq8aiMWtMGqPGoNFrdBpBo9VoNGqNSqPUKDS8HxW5SdXxM1X+AAAAAElFTkSuQmCC);
            border-width:0 3px;
            height:26px;
            margin:4px 0;
            text-align:center
        }

        .txt:hover,textarea:hover,#header:hover,#footer:hover {
            border-color:#0089A8
        }

        .txt:focus,textarea:focus,#header:active,#footer:active {
            border-color:#00BBE6
        }

        .buttn:hover,#menu a:hover {
            background:#0089A8
        }

        .buttn:focus,#menu a:focus {
            background:#00BBE6
        }

        #header,#footer,.txt,textarea {
            border-color:#00576A;
            border-style:solid
        }

        textarea {
            background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAACcCAMAAAAK9wgdAAAALHRFWHRDcmVhdGlvbiBUaW1lAHNyaSAyMyBzaWogMjAxMyAwMDowNDo0OSArMDEwMJhtBAEAAAAHdElNRQfdAR8LHTsVXKHxAAAACXBIWXMAAAsSAAALEgHS3X78AAAABGdBTUEAALGPC/xhBQAAAMZQTFRFqqqqq6urra2tr6+vsbGxs7OztbW1t7e3ubm5u7u7vb29v7+/wcHBwsLCxMTExsbGyMjIysrKzMzMzs7O0NDQ0tLS1NTU1dXV1tbW19fX2NjY2dnZ2tra29vb3Nzc3d3d3t7e39/f4ODg4eHh4uLi4+Pj5OTk5eXl5ubm5+fn6Ojo6enp6urq6+vr7Ozs7e3t7u7u7+/v8PDw8fHx8vLy8/Pz9PT09fX19vb29/f3+Pj4+fn5+vr6+/v7/Pz8/f39/v7+////Gh/Q3AAAAN9JREFUeNrNy9k6ggEARdFjSIaohEgUFTJVqJQh3v+lPMN2sb9/3a/8YvlH+cGkssKk8o1J5QuTyicmlQ9MKktMKgtMKu+YVOaYVGaYVKaYVN4wqbxiUnnBpDLBpDLGiltGmFSeMak8YVJ5xKTygEnlHpPKEJPKHSaVW0wqN5hUBphU+phUephUrjGpXGFS6WLFLR1MKpeYVC4wqbQxqZxjUmlhUjnDpHKKSaWJSeUEK245xnKEpYHlEEsdSw1LFcsBln0sFSx7WHax7GDZxlLGsoWlhGUTywaWdSxrWLg/YRiWESlSzsgAAAAASUVORK5CYII=);
            border-width:0 4px;
            overflow:auto;
            padding:6px;
            width:500px;
            height:144px
        }

        input.checkb {
            margin-top:15px
        }

        a:link,a:visited {
            color:#6B4900;
            font-size:13px;
            text-decoration:none
        }

        a:hover,a:focus {
            color:#6B4900;
            text-decoration:underline
        }


        #menu a {
            float:left;
            margin-right:4px;
            padding:6px 8px;
            text-decoration:none
        }


        h2 {
            font-size:16px;
        }


        h3 {
            color:#6B4900;
            font:28px Courier,monospace;
            line-height:10px;
        }

        h3,.buttn,#menu a,#footertext {
            text-shadow:0 1px 1px rgba(0,0,0,0.333)
        }

        hr {
            border:1px solid #FFF
        }

        .table1 td,.table1 th {
            color:#000;
            padding:5px 7px;
            text-align:left
        }

        .table1 th {
            font-family:Constantia,Georgia,serif
        }

        .table1 td {
            background:#EBFCFF;
            font-size:12px
        }

        .floatimg {
            margin:0 19px 19px 0
        }

        #checkout {
            font-size:25px
        }

        #warning {
            color:#E62A00;
            font-weight:700
        }

        #footertext {
            font-size:11px;
            text-align:center;
            top:23px;
            margin:0 auto 0px;
        }
    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<div id="main">
    <div id="header">
        <div id="logo">
            <a href="/"><img src="/img/logo.png" alt="Logo"></a>
        </div>
    </div>
    <div id="menu">
        <a href="/" title="Home">Home</a>

        @if(auth()->user())
            <a href="/wallet" title="Your Ethereum wallet">Wallet ( <b id="balance"></b> ETH )</a>
            <a href="/message" title="Contact support">Messages ( <b id="message_count"></b> )</a>
            <a href="/setting" title="Account settings">Settings</a>
        @else
            <a href="/login" title="Login">Login</a>
            <a href="/register" title="Register">Register</a>
        @endif

        <a href="/faq" title="FAQ">FAQ</a>

        @if(auth()->user())
            <a href="#" onclick="event.preventDefault(); document.getElementById('form-logout').submit()" title="Logout">Logout ({{ auth()->user()->username }})</a>
        @endif
    </div>
    <form id="form-logout" style="display: none" method="POST" action="/logout">
        @csrf
    </form>
    @yield('content')
    <br>
    <div id="footer">
        <div id="footertext">Copyright ©2018-2020 RoseWallet - Simple and secure Ethereum wallet&nbsp;&nbsp;&nbsp;
            <a href="/privacy">Privacy Policy</a>&nbsp;
            <a href="/terms">Terms</a>&nbsp;
            <a href="/message">Contact us</a>&nbsp;</div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function getBalance() {
        $.ajax({
            url: '/get_balance',
            type: 'GET',
            dataType: 'text',
            success: function (result) {
                $("#balance").html(result);
                $("#balance_eth").html(result);
                setTimeout(function () {
                    getBalance();
                }, 1000);
            }
        });
    }
    function getMessage() {
        $.ajax({
            url: '/get_message',
            type: 'GET',
            dataType: 'text',
            success: function (result) {
                $("#message_count").html(result);
                setTimeout(function () {
                    getMessage();
                }, 1000);
            }
        });
    }
    getBalance();
    getMessage();

</script>
@yield('script')

@include('notification')
</body></html>
