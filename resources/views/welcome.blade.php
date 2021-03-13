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
        
        <div class="mx-auto  w-96 min-h-screen flex flex-col justify-center">
            <div class="text-center">
                <a href="/" class="">
                    <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="inline-block" >
                </a>
            </div>
            <div class="mt-8 mx-auto grid grid-cols-2 gap-3 justify-items-stretch">
                @auth
                    <a href="{{ url('/tweets') }}" class="block text-center rounded bg-blue-400 text-white shadow px-4 py-1.5">Home</a>
                    <form action="{{ route('logout') }}" method="POST" class="">
                        @csrf
                        <button class="block w-full text-center rounded bg-red-400 text-white shadow px-4 py-1.5">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block text-center rounded bg-blue-500 text-white shadow px-4 py-1.5">Login</a>
                    <a href="{{ route('register') }} " class="block text-center rounded bg-blue-800 text-white shadow px-4 py-1.5">Register</a>
                @endauth
            </div>
        </div>

    </div>
</body>
</html>
