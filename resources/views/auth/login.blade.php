@extends('layouts.auth')

@section('content')
<div class="">
    <div class="">
        <div class="">
            <div class="">
                <div class="text-xl mb-4">{{ __('Login') }}</div>

                <div class="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-2">
                            <label for="email" class="text-sm">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="border border-gray-600 rounded px-2 py-1 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="text-sm">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="border border-gray-600 rounded px-2 py-1 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="">
                                <div class="">
                                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="text-sm" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <button type="submit" class="rounded bg-blue-500 text-white shadow py-1 px-4">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="ml-4" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
