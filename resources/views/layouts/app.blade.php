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
<body>
    <div id="app" class="text-black">
        <section class="px-8 py-8">
            <header class="container mx-auto">
                <a href="" class="block">
                    <img src="{{ asset('images/logo.svg') }}" alt="Logo" >
                </a>
            </header>
        </section>
        <section class="px-8">
            <main class="container mx-auto">
                <div class="flex justify-between">
                    <div class="">
                        @include('_sidebar-links')
                    </div>
            
                    <div class="flex-grow mx-20 mb-20">
                        @yield('content')
                    </div>
                    
                    <div class="flex-shrink-0 w-1/6">
                        @include('_friends-list')
                    </div>
                </div>
            </main>
        </section>
    </div>
</body>
</html>
