<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body class="antialiased">
        <div class="flex items-center min-h-screen bg-gray-100">

            <div class="mx-auto rounded-xl bg-white shadow p-10">
                <div class="text-6xl">
                    <a href="{{ url('/tweets') }}">Tweeter</a>
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
