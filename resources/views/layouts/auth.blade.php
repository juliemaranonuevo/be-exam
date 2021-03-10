<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta http-equiv="refresh" content="600" />
        <title>Praxxys Exam | @yield('head_title')</title>
        <link rel="shortcut icon" href="{{ asset('/img/laravel.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('vendor/components/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/components/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/components/Ionicons/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>
            .title b {
                color: #8CC5F5;
            }
            .login-page {
                background-color: #7EBAEA;
                margin-top: 140px;
            }
            .fa {
                margin-left: -12px;
                margin-right: 5px;
            }
        </style>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-box-body">
                @yield('content')
            </div>
        </div>
    </body>
    <script src="{{ asset('vendor/components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/vendor/components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#login', function() {
                $('.sign-in').attr("disabled", true);
                $('.loading').addClass("fa-spinner fa-spin");
            });
        });
    </script>
</html>
