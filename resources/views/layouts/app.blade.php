<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Agency')</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/86bd4d4675.js" crossorigin="anonymous"></script>
    </head>
    <body>
        @yield('body')
        @stack('scripts')
    </body>
</html>
