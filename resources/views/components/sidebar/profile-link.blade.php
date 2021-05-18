@props([
    'user'
])

<a href="{{ $user->path() }}" class="block">
    <div class="flex px-4 py-3 items-center hover:bg-twgray150 transition duration-200">
        <div  class="flex-shrink-0 w-12 h-12 mr-3 rounded-full overflow-hidden">
            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="object-cover h-full w-full filter hover:brightness-90 transition-all duration-200">
        </div>
        <div class="flex-auto min-w-0 truncate">
            <span href="" class="font-bold group">
                <span class="group-hover:underline">{{ $user->name }}</span><br>
                <span class="text-bluegray-500 font-normal">{{ '@'.$user->username }}</span>
            </span>
        </div>
        <div class="flex-shrink-0 ml-3">
            <x-shared.follow-btn :user="$user" :is-following="current_user()->isFollowing($user)" />
        </div>    
    </div>
</a>


