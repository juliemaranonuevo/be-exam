<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('/img/laravel.png') }}" type="image/x-icon">
    <title>Praxxys Exam</title>
    @include('layouts.header')
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
    <div id="app">
        <app></app>
    </div>
</body>
<script src="{{ mix('js/app.js') }}"></script>
@include('layouts.footer')
</html>
