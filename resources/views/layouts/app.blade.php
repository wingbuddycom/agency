<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Agency')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('commissions', ['locale' => app()->getLocale()]) }}">Agency</a>
        <div class="ms-auto">@include('components.lang-switch')</div>
    </div>
</nav>

<main class="container py-4">
    @yield('content')
</main>
</body>
</html>
