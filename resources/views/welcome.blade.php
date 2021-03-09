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
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    <a href="{{ url('/home') }}">Home</a>
                </div>

                <div class="links">
                    @auth
                        <a href="{{ url('/tweets') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            </div>
            
        </div>
    </body>
</html>
