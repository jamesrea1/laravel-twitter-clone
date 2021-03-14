<x-master>
    
    <main class="container mx-auto px-8">
        
        <div class="text-xl mb-4">Login</div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-2">
                <label for="email" class="text-sm">{{ __('E-Mail Address') }}</label>

                <div class="">
                    <input id="email" 
                           type="email" 
                           class="border rounded px-2 py-1 
                               {{$errors->has('email')?'border-red-600':'border-gray-600'}}
                           " 
                           name="email" 
                           value="{{ old('email') }}" 
                           required
                           autocomplete="email" 
                           autofocus
                    >

                    @error('email')
                        <span class="ml-2 text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="password" class="text-sm">{{ __('Password') }}</label>

                <div class="">
                    <input id="password" 
                           type="password" 
                           class="border rounded px-2 py-1 
                               {{$errors->has('password')?'border-red-600':'border-gray-600'}}
                           " 
                           name="password" 
                           required
                           autocomplete="current-password"
                    >

                    @error('password')
                        <span class="ml-2 text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-2">
                <div class="">
                    <div class="">
                        <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="text-sm" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <div class="">
                    <button type="submit" class="rounded bg-twitter text-white shadow py-1 px-4">
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
    </main>

</x-master>
