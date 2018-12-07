<!-- originele eigen gemaakte layout -->
<!-- door het commando
    php artisan make:auth
    wordt een nieuw bestand aangemaakt -->

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('public/js/app.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('public/css/app.css') }}" type="text/css">
    <title>{{config('app.name', 'Midenpolder')}}</title>
    </head>
    <body>
        @include('inc.navbar')
        <div class = "container">
            @include('inc.messages')
            @yield('content')
        </div>
    </body>
</html>
