<x-layout.master>
    <main class="flex">
        <div class="mx-auto pt-8 pb-8 px-9 rounded-xl bg-gray-200" style="min-width:24rem;">
            <h1 class="text-3xl mb-8">Register</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label for="username" class="text-xs text-gray-600 font-bold uppercase block b-2">       
                        Username
                    </label>
                    <div class="flex flex-col">
                        <input id="username" 
                               type="text" 
                               class="border rounded px-2 py-1.5 w-full
                                      outline-none
                                      focus:outline-none
                                      focus:ring-2
                                      {{ $errors->has('username')?'border-red-600 focus:ring-red-300':'border-gray-400 focus:ring-twitter'}}
                               "
                               name="username" 
                               value="{{ old('username') }}" 
                               requiredX 
                               autocomplete="username" 
                               autofocus
                        >
                        @error('username')
                            <p class="ml-0 mt-1 text-sm text-red-600" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label for="name" class="text-xs text-gray-600 font-bold uppercase block b-2">
                        Name
                    </label>
                    <div class="flex flex-col">
                        <input id="name" 
                               type="text" 
                               class="border rounded px-2 py-1.5 w-full
                                      outline-none
                                      focus:outline-none
                                      focus:ring-2
                                      {{ $errors->has('name')?'border-red-600 focus:ring-red-300':'border-gray-400 focus:ring-twitter' }}
                               "
                               name="name" 
                               value="{{ old('name') }}" 
                               requiredX 
                               autocomplete="name" 
                        >
                        @error('name')
                            <p class="ml-0 mt-1 text-sm text-red-600" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>
                </div>
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
                               requiredX 
                               autocomplete="email"
                        >
                        @error('email')
                            <p class="ml-0 mt-1 text-sm text-red-600" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="text-xs text-gray-600 font-bold uppercase block b-2">
                        Password
                    </label>
                    <div class="flex flex-col">
                        <input id="password" 
                               type="password" 
                               class="border rounded px-2 py-1.5 w-full
                                      outline-none
                                      focus:outline-none
                                      focus:ring-2
                                      {{ $errors->has('password')?'border-red-600 focus:ring-red-300':'border-gray-400 focus:ring-twitter' }}
                               "
                               name="password" 
                               requiredX
                               autocomplete="new-password"
                        >
                        @error('password')
                            <p class="ml-0 mt-1 text-sm text-red-600" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password-confirm" class="text-xs text-gray-600 font-bold uppercase block b-2">
                        Confirm Password
                    </label>
                    <div class="flex flex-col">
                        <input id="password-confirm" 
                               type="password" 
                               class="border rounded px-2 py-1.5 w-full
                                      outline-none
                                      focus:outline-none
                                      focus:ring-2
                                      focus:ring-twitter
                                      border-gray-400
                               "
                               name="password_confirmation" 
                               requiredX 
                               autocomplete="new-password"
                        >
                    </div>
                </div>
                <div class="mt-6">
                    <div class="">
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
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</x-master>