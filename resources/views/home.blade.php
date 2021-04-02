<x-layout.app>
    <x-content-header>
        Home
    </x-content-header>
    
    <x-publish-tweet-panel />
        
    <div class="h-2.5 border-b border-gray-200 bg-bluegray-50"></div>

    <x-timeline :tweets="$tweets" />
        
    <x-slot name="sidebar">
        @include ('partials/_friends-list')
    </x-slot>
</x-layout.app>