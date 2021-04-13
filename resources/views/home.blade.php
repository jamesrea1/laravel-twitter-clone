<x-layout.app>
    {{-- main content --}}
    <x-blocks.content-header>
        Home
    </x-blocks.content-header>
    <x-blocks.publish-tweet-panel />
    <x-blocks.content-seperator />
    <x-home.timeline :tweets="$tweets" />
    
    {{-- main sidebar --}}
    <x-slot name="sidebar">
        <x-home.sidebar :who-to-follow="$whoToFollow"/>
    </x-slot>
</x-layout.app>