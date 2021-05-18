@props([
    'user',
    'isFollowing'
])

<button 
    data-following-user-id="{{ $user->id }}" 
    data-is-following="{{ intval($isFollowing)  }}" 
    class="js-followBtn inline-block rounded-full px-3.5 pt-1 pb-1.5 font-bold border transition duration-200
        {{ $isFollowing ? 'follow-btn--is-following' : 'follow-btn--not-following'  }}
    "
>
    <div class="relative">
        <span class="">{{ $isFollowing ? 'Following' : 'Follow' }}</span>
    </div>
</button>
