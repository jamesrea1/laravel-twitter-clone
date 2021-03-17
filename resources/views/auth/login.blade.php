<x-master>
    <main class="flex">
        <div class="mx-auto pt-8 pb-8 px-9 rounded-xl bg-gray-200" style="min-width:24rem;">
            <h1 class="text-3xl mb-8">Login</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="text-xs text-gray-600 font-bold uppercase block b-2">            
                        Email
                    </label>
                    <div class="flex flex-col">
                        <input id="email"
                               type="email"
                               class="border rounded px-2 py-1.5 w-full
                                      outline-none
                                      focus:outline-none
                                      focus:ring-2
                                      {{ $errors->has('email')?'border-red-600 focus:ring-red-300':'border-gray-400 focus:ring-twitter' }}
                               "
                               name="email"
                               value="{{ old('email') }}"
                               autocomplete="email"
                               autofocus
                        >
                        @error('email')
                            <p class="ml-0 mt-1 text-sm text-red-600" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="mb-5">
                    <label for="password" class="text-xs text-gray-600 font-bold uppercase block mb-2">
                        Password
                    </label>
                    <div class="flex flex-col">
                        <input id="password"
                               type="password"
                               class="border rounded px-2 py-1.5 w-full
                                      outline-none
                                      focus:outline-none
                                      focus:ring-2
                                      {{$errors->has('password')?'border-red-600 focus:ring-red-300':'border-gray-400 focus:ring-twitter'}}
                               "
                               name="password"
                               autocomplete="current-password"
                        >
                        @error('password')
                            <p class="ml-0 mt-1 text-sm text-red-600" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="mb-6">
                    <input class="outline-none
                                  focus:outline-none
                                  focus:ring-1
                                  focus:ring-twitter
                           "
                           type="checkbox" 
                           name="remember" 
                           id="remember" {{ old('remember') ? 'checked' : '' }}
                    >
                    <label class="text-xs text-gray-600 font-bold uppercase" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <div class="mt-4">
                    <button type="submit" 
                            class="rounded shadow py-1 pb-2 px-5 text-white text-lg  
                                    bg-twitter hover:opacity-80
                                    outline-none
                                    focus:outline-none
                                    focus:ring-2
                                    focus:ring-lightblue-700
                                    focus:ring-offset-0
                                    focus:ring-offset-white
                            "
                    >
                        {{ __('Login') }}
                    </button>
                    @if (Route::has('password.request'))
                        <a class="ml-4 outline-none
                                  focus:outline-none
                                  focus:ring-2
                                  focus:ring-twitter" href="{{ route('password.request') }}
                           "
                        >
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </main>
</x-master>
