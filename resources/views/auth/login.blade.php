<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin | Shop2</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        window.laravel_token = '{!! csrf_token() !!}';
    </script>
@yield("meta")

<!-- Favicon-->
    <link rel="icon" href="/assets/admin/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="/assets/admin/css/auth.css" rel="stylesheet"/>

    @yield("style")
</head>

<body class="login-page">
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">Admin <b>Shop2</b></a>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in" method="POST" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="msg">Sign in to start your session</div>
                @include("admin.layouts.partials.message")
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="email" placeholder="Email" required
                               autofocus value="{{ old("email") }}">
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        <input type="checkbox" name="remember" id="remember" class="chk-col-red">
                        <label for="remember">Remember Me</label>
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-red waves-effect" type="submit">SIGN IN</button>
                    </div>
                </div>
                {{--<div class="row m-t-15 m-b--20">--}}
                {{--<div class="col-xs-6"></div>--}}
                {{--<div class="col-xs-6 align-right">--}}
                {{--<a href="forgot-password.html">Forgot Password?</a>--}}
                {{--</div>--}}
                {{--</div>--}}
            </form>
        </div>
    </div>
</div>
<script src="/assets/admin/js/auth.js"></script>
<!-- Jquery Validation Plugin Css -->
<script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>
<script>
    $(function () {
        $('#sign_in').validate({
            rules: {
                email: {required: true, email: true},
                password: {required: true, minlength: 6}
            },
            highlight: function (input) {
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function (input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function (error, element) {
                $(element).parents('.input-group').append(error);
            }
        });
    });
</script>
</body>
</html>