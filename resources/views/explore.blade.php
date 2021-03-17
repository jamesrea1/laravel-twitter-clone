<x-app>
    <div>
        @foreach ($users as $user)
            <div class="flex justify-start items-center mb-4">
                <a href="{{ $user->path() }}" class="rounded-md overflow-hidden">
                    <img src="{{ $user->avatar }}"
                        alt="{{ $user->username }}"
                        width="60" height="60"
                    >
                </a>
                <p class="ml-3 text-xl font-bold"><a href="{{ $user->path() }}">{{ "@".$user->username }}</a></p>
            </div>
        @endforeach
    </div>
    <div class="mt-4">{{ $users->links() }}</div>
</x-app>