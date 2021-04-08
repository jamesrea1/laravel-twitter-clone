<x-layout.master>
    <div id="app" class="flex text-bluegray-900 text-base">
        <header class="flex flex-col items-end [ flex-grow ]">
            <x-layout.header />
        </header>
        <main class="flex flex-col items-start  [ flex-grow ]">
            <x-layout.main>
                <x-layout.content>
                    {{ $slot }}
                </x-layout.content>
                <x-layout.sidebar>
                    {{ $sidebar }}
                </x-layout.sidebar>
            </x-layout.main>
        </main>
    </div>
</x-layout.master>


