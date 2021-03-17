<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="min-h-screen">
    <div id="app" class="text-black">
        <header class="container mx-auto px-8 py-8">
            <a href="/" class="">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo" >
            </a>
        </header>

        {{ $slot }}
    </div>
</body>
</html>
