@props([
    'url', 
    'active' => false
])

<a class="w-full py-1 flex justify-center lg:justify-start font-bold text-xl leading-6 group" 
    href="{{ $url }}"
>
    <div class="p-3 flex items-center rounded-full group-hover:bg-twlightblue group-hover:text-twitter 
        {{-- group-focus:ring-2 group-focus:ring-twitter group-focus:ring-opacity-60 --}}
        {{ $active ? 'text-twitter' : 'text-black' }}
        transition-colors duration-200
        "
    >
        <div class="">
            {{ $active ? $iconActive : $icon }}
        </div>
        <div class="hidden lg:block ml-5 mr-4">
            {{ $slot }}
        </div>
    </div>
</a>


