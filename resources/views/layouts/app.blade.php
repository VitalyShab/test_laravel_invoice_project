<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body class="bg-light">
<div id="app">
    <div class="container">
        @include('shared/alerts')

        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>
</html>
