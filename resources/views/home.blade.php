<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Praxxys Exam</title>
    @include('layouts.header')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
    <div id="app">
        <!-- <app src="https://hls.protone.media/redfield.m3u8"></app> -->
        <!-- <app src="../../storage/videos/c.mp4"></app> -->
        
        <app></app>
        <!-- <img width="50%" src="../../storage/images/60483f9b3788d.jpg" alt="as"> -->
    </div>
</body>
<script src="{{ mix('js/app.js') }}"></script>
@include('layouts.footer')
</html>
