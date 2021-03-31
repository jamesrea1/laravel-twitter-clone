<x-master>
    <div id="app" class="flex">
        {{-- text-black --}}
        
        <header class="flex flex-col items-end [ flex-grow ]">
            <x-app-header>

            </x-app-header>
        </header>
        <main class="flex flex-col items-start  [ flex-grow ]">
            <div class="flex" style="width:990px;">
                <section class="flex-grow">
                    {{ $slot }}
                </section>
                <section class="flex-grow">
                    <x-app-sidebar>

                    </x-app-sidebar>
                </section>
            </div>
        </main>



    </div>
</x-master>