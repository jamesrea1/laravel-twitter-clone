{{-- <div class="">
    <?php 
        // get avatar in separate statement to show SQL log in div
        //$url = $tweet->user->avatar; 
    ?> 
</div>  --}}


<div class="flex p-4 ">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ $tweet->user->path() }}" >
            <img
                src="{{ $tweet->user->avatar }}"
                alt="Avatar"
                class="rounded-full mr-2"
                width="50"
                height="50"
            >
        </a>
    </div>
    <div>
        <h5 class="font-bold mb-2">
            <a href="{{ $tweet->user->path() }}" >
                {{ $tweet->user->name }}
            </a>
        </h5>
        <p class="text-sm">
            {{ $tweet->body }}
        </p>
    </div>
</div>
