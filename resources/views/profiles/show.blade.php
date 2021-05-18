<x-layout.app>


    {{-- main content --}}

    <x-shared.content-header>
        Profile
    </x-shared.content-header>
    
    {{-- <x-profile.header /> --}}


    @foreach ($following as $user )
        <div class="flex-shrink-0 ml-3">
            <x-shared.follow-btn :user="$user" :is-following="current_user()->isFollowing($user)" />
            <div>{{ $user->id }}</div>
        </div>  
    @endforeach



    <x-home.timeline :tweets="$tweets" />
  
    {{-- / end main content --}}
    



    {{-- main sidebar --}}
    <x-slot name="sidebar">
        {{-- <x-home.sidebar :who-to-follow="$whoToFollow"/> --}}
    </x-slot>
    {{-- / end main sidebar --}}


</x-layout.app>