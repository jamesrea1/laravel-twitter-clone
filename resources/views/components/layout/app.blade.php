<x-layout.master>
    <div id="app" class="flex text-bluegray-900 text-base">
        <header class="flex flex-col items-end flex-grow">
            <x-layout.header />
        </header>
        <main class="flex flex-col items-start flex-grow">
            <div class="l-main flex items-stretch justify-between">
                <div class="l-content border-l border-r border-gray-200">
                    {{ $slot }}
                </div>
                <div class="l-sidebar mr-2.5">
                    {{ $sidebar }}
                </div>
            </div>
        </main>
    </div>
</x-layout.master>


