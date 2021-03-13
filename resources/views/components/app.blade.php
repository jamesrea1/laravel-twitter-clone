<x-master>
    <main class="container mx-auto px-8">
        <div class="flex justify-between">
            <section class="">
                @include('_sidebar-links')
            </section>

            <section class="flex-grow mx-20 mb-20">
                {{ $slot }}
            </section>
            
            <section class="flex-shrink-0 w-1/6">
                @include('_friends-list')
            </section>
        </div>
    </main>
</x-master>