<div class="flex px-4 pt-3 pb-1">
    <div class="mr-1 flex-shrink-0">
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
    <div class="flex-auto min-w-0">
        <h5 class="flex items-center whitespace-nowrap overflow-hidden">
            <a href="{{ $tweet->user->path() }}" class="font-bold truncate inline-block" style="max-width: 80%">
                {{ $tweet->user->name }}
                <span class="text-bluegray-500 font-normal ml-0.5">{{ ' @'.$tweet->user->username }}</span>
            </a>
            <span class="text-bluegray-500 font-normal">· {{ format_tweet_date($tweet->created_at) }}</span>
        </h5>

        <p class="mt-1 break-words">
            {{ $tweet->body }}
        </p>

        <div class="flex justify-between w-5/6 mt-1 -ml-2.5">
            
            <a href="/" class="w-9 h-9 flex items-center justify-center rounded-full [ text-bluegray-500 hover:text-twitter hover:bg-twitter hover:bg-opacity-10 ]">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><g><path d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path></g></svg>
            </a>

            <a href="/" class="w-9 h-9 flex items-center justify-center rounded-full [ text-bluegray-500 hover:text-green-600 hover:bg-green-600 hover:bg-opacity-10 ]">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><g><path d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"></path></g></svg>
            </a>
            
            <a href="/" class="w-9 h-9 flex items-center justify-center rounded-full [ text-bluegray-500 hover:text-red-600 hover:bg-red-600 hover:bg-opacity-10 ]">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><g><path d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path></g></svg>
            </a>

            <a href="/" class="w-9 h-9 flex items-center justify-center rounded-full [ text-bluegray-500 hover:text-twitter hover:bg-twitter hover:bg-opacity-10 ]">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><g><path d="M17.53 7.47l-5-5c-.293-.293-.768-.293-1.06 0l-5 5c-.294.293-.294.768 0 1.06s.767.294 1.06 0l3.72-3.72V15c0 .414.336.75.75.75s.75-.336.75-.75V4.81l3.72 3.72c.146.147.338.22.53.22s.384-.072.53-.22c.293-.293.293-.767 0-1.06z"></path><path d="M19.708 21.944H4.292C3.028 21.944 2 20.916 2 19.652V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 .437.355.792.792.792h15.416c.437 0 .792-.355.792-.792V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 1.264-1.028 2.292-2.292 2.292z"></path></g></svg>
            </a>

        </div>
            

        {{-- <div class="mt-4 -ml-1.5 flex items-center justify-start">
            <form action="/tweets/{{ $tweet->id }}/likes" method="POST">
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
            <form action="/tweets/{{ $tweet->id }}/likes" method="POST">
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
        </div> --}}
    </div>
</div>
