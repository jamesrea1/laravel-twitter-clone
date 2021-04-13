@props([
    'url', 
    'active' => false
])

<a class="w-full flex justify-start mb-2 font-bold text-xl group" 
    href="{{ $url }}"
>
    <div class="flex items-center px-3 py-3 rounded-full group-hover:bg-twitter group-hover:bg-opacity-10 group-hover:text-twitter 
        {{-- group-focus:ring-2 group-focus:ring-twitter group-focus:ring-opacity-60 --}}
        {{ $active ? 'text-twitter' : 'text-black' }}
        "
        style="transition:background-color 200ms"
    >
        <div class="" style="width:1.7rem">
            {{ $active ? $iconActive : $icon }}
        </div>
        <div class="mx-5">
            <span>{{ $slot }}</span>
        </div>
    </div>
</a>


