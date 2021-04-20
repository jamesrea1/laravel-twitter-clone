<x-layout.app>
    {{-- main content --}}
    <x-shared.content-header>
        Home
    </x-shared.content-header>
    
    <div class="hidden sm:block">
        <x-shared.publish-tweet-panel />
        <x-shared.content-seperator />
    </div>

    <x-home.timeline :tweets="$tweets" />
    
    {{-- main sidebar --}}
    <x-slot name="sidebar">
        <x-home.sidebar :who-to-follow="$whoToFollow"/>
    </x-slot>
</x-layout.app>