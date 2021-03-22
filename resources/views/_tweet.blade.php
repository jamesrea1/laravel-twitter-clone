<div class="flex p-4">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ $tweet->user->path() }}">
            <img
                src="{{ $tweet->user->avatar }}"
                alt="{{ $tweet->user->username }}"
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
        <div class="mt-4 -ml-1.5 flex items-center justify-start">
            <form action="/tweets/{{ $tweet->id }}/like" method="POST">
                <div class="{{ $tweet->isLikedBy(current_user())? 'text-twitter' : 'text-bluegray-400' }} "> 
                    @csrf
                    <input type="hidden" name="liked" value="1" required>
                    <button type="submit" class="text-current flex items-center rounded-full px-2 py-1 hover:bg-gray-200 ">
                        <svg viewBox="0 0 20 20" width="16" class="inline-block pb-1" xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-current" fill-rule="evenodd" d="M11.001 0A1.995 1.995 0 009 1.998V8H1.997A1.994 1.994 0 000 10v2l2.297 6.124C2.685 19.16 3.902 20 5.009 20h7.982A2 2 0 0015 18v-8l-3-7V0h-.999zM17 10h3v10h-3V10z" />
                        </svg>
                        <span class="text-sm text-current ml-2">{{ $tweet->likes ?: '0' }}</span>
                    </button>
                </div>
            </form>
            <form action="/tweets/{{ $tweet->id }}/like" method="POST">
                <div class="ml-4 {{ $tweet->isDislikedBy(current_user())? 'text-twitter' : 'text-bluegray-400' }} ">
                    @csrf
                    <input type="hidden" name="liked" value="0" required>
                    <button type="submit" class="text-current flex items-center rounded-full px-2 py-1 hover:bg-gray-200 ">
                        <svg viewBox="0 0 20 20" width="16" class="inline-block pt-1" xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-current" fill-rule="evenodd" d="M11.001 20A1.995 1.995 0 019 18.002V12H1.997A1.994 1.994 0 010 10V8l2.297-6.124C2.685.84 3.902 0 5.009 0h7.982A2 2 0 0115 2v8l-3 7v3h-.999zM17 10h3V0h-3v10z" />
                        </svg>
                        <span class="text-sm text-current  ml-2">{{ $tweet->dislikes ?: '0' }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
