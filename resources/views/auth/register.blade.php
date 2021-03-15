<x-master>

    <main class="container mx-auto px-8">
        
        <div class="text-xl mb-4">Register</div>  
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-2">
                <label for="username" class="text-sm">{{ __('Username') }}</label>

                <div class="col-md-6">
                    <input id="username" 
                           type="text" 
                           class="border rounded px-2 py-1 
                               {{$errors->has('username')?'border-red-600':'border-gray-600'}}
                           " 
                           name="username" 
                           value="{{ old('username') }}" 
                           required 
                           autocomplete="username" 
                           autofocus
                    >

                    @error('username')
                        <span class="ml-2 text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-2">
                <label for="name" class="text-sm">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" 
                           type="text" 
                           class="border rounded px-2 py-1 
                               {{$errors->has('name')?'border-red-600':'border-gray-600'}}
                           " 
                           name="name" 
                           value="{{ old('name') }}" 
                           required 
                           autocomplete="name" 
                    >

                    @error('name')
                        <span class="ml-2 text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

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
                    >

                    @error('email')
                        <span class="ml-2 text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-2">
                <label for="password" class="text-sm">{{ __('Password') }}</label>

                <div class="">
                    <input id="password" 
                           type="password" 
                           class="border rounded px-2 py-1 
                               {{$errors->has('password')?'border-red-600':'border-gray-600'}}
                           " 
                           name="password" 
                           required 
                           autocomplete="new-password"
                    >

                    @error('password')
                        <span class="ml-2 text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-2">
                <label for="password-confirm" class="text-sm">{{ __('Confirm Password') }}</label>

                <div class="">
                    <input id="password-confirm" 
                           type="password" 
                           class="border rounded px-2 py-1 border-gray-600" 
                           name="password_confirmation" 
                           required 
                           autocomplete="new-password"
                    >
                </div>
            </div>

            <div class="mt-6">
                <div class="">
                    <button type="submit" class="rounded bg-twitter text-white shadow py-1 px-4">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </main>

</x-master>