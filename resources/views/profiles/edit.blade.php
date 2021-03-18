<x-app>
    <form action="{{ $user->path() }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        
        <x-form-input 
            label="Name"
            name="name" 
            id="name"
            type="text" 
            required 
            autocomplete="off"
            autofocus 
            :value="$user->name"
            :has-error="$errors->has('name')"
            class="" 
        />
            
        <x-form-input 
            label="Username"
            name="username" 
            id="username"
            type="text" 
            required
            autocomplete="off"
            :value="$user->username"
            :has-error="$errors->has('username')"
            class="" 
        />

        {{-- Avatar --}}
        <div class="mb-4 flex flex-col">
            <label for="avatar"
                   class="text-sm uppercase font-bold mb-2 text-bluegray-700"
            >
                Avatar
            </label>
    
            <div class="flex items-center justify-between pl-3 border rounded focus-within:outline-none focus-within:ring-1 {{
                    $errors->has('avatar') ?
                    'border-red-600 focus-within:ring-red-600' :
                    'border-bluegray-400 focus-within:ring-bluegray-400'
                }}"
            >
                <input
                    label="Avatar"
                    name="avatar"
                    id="avatar"
                    type="file"
                    autocomplete="off"
                    accept="image/*"
                    class='focus:outline-none'
                >
                <img src="{{ $user->avatar }}" alt="{{ $user->username }}" class="w-16 h-16 rounded-none object-cover">
            </div>
                        
            @error('avatar')
                <span class="mt-1 text-sm text-red-600 font-bold" role="alert">
                    {{ $message }}
                </span>
            @enderror     
        </div>
            
        <x-form-input 
            label="Email"
            name="email" 
            id="email"
            type="email" 
            required 
            autocomplete="off"
            :value="$user->email"
            :has-error="$errors->has('email')"
            class="" 
        />
        
        <x-form-input 
            label="Password"
            name="password" 
            id="password"
            type="password" 
            required 
            autocomplete="current-password"
            :has-error="$errors->has('password')"
            class="" 

            value="assdew123"
        />
        
        <x-form-input 
            label="Confirm Password"
            name="password_confirmation" 
            id="password_confirmation"
            type="password" 
            required 
            autocomplete="off"
            :has-error="$errors->has('password_confirmation')"
            class="" 
        
            value="assdew123"
        />
        
        <button type="submit" 
                class="bg-twitter text-white rounded-lg shadow px-4 py-2 mt-3 hover:opacity-80 focus:outline-none focus:ring-2 ring-bluegray-700" 
        >
            Submit
        </button> 
    
        <a href="{{ $user->path() }}"
                class="bg-white border rounded-lg px-4 py-2 mt-3 ml-2 hover:bg-gray-100 focus:outline-none focus:ring-2 ring-bluegray-700" 
        >
            Cancel
        </a> 
    
    </form>
</x-app>