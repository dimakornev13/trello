<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylesheets.css') }}" rel="stylesheet">

</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="container" id="app">
        <!-- Content here -->
    </div>
</div>

<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
