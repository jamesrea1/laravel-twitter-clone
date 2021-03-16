<x-app>
    <form action="{{ $user->path() }}" method="POST">
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
            autocomplete="off"
            :has-error="$errors->has('password')"
            class="" 
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
        />
        
        <button type="submit" 
                class="bg-twitter text-white rounded-lg shadow px-4 py-2 mt-3 " 
        >
            Submit
        </button> 
    
    </form>
</x-app>