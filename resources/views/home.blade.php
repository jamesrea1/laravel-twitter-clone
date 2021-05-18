<x-layout.app>

    {{-- main content --}}
    <x-shared.content-header>
        Home
    </x-shared.content-header>
    <div class="hidden sm:block">
        <x-home.publish-tweet-panel />
        <x-shared.content-seperator />
    </div>
    <x-home.timeline :tweets="$tweets" />
    {{-- / end main content --}}


    {{-- main sidebar --}}
    <x-slot name="sidebar">
        <x-sidebar.sidebar-layout :who-to-follow="$whoToFollow"/>
    </x-slot>
    {{-- /end main sidebar --}}

</x-layout.app>