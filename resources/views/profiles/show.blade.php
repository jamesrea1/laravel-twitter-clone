<x-app>
    <header class="mb-10">
        <div class="relative mb-3">
            <img src="/images/default-profile-banner.jpg" alt="Profile banner" class="w-full">
            <img src="{{ $user->avatar }}" class="rounded-full absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2" alt="{{ $user->username }}" width="150" height="150">
        </div>
        <div class="flex justify-between align-middle items-center mb-8">
            <div>
                <h2 class="font-bold text-2xl mb-0.5">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{$user->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex align-middle">
                
                @can('edit', $user)
                    <a href="{{ $user->path('edit') }}" class="rounded-full text-black border py-2 px-6 text-sm tracking-wide ">Edit Profile</a>
                @endcan
            
                <x-follow-button :user="$user" />
            
            </div>
        </div>
        <p class="text-sm text-center">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione accusamus quam quas totam atque nihil excepturi vitae 
            accusantium architecto. Veniam aspernatur vel eius nobis sit sequi quo quia dignissimos minus. Lorem ipsum dolor sit amet 
            consectetur adipisicing elit. Expedita, necessitatibus.
        </p>
    </header>

    @include ('_timeline', [
        'tweets' => $tweets
    ])

</x-app>