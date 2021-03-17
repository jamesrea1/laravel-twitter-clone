<div class="bg-bluegray-100 rounded-xl py-6 px-6">
    <h3 class="text-xl mb-5 font-bold">Following</h3>
    <ul>
        @forelse(current_user()->follows as $user )
            <li class="{{ $loop->last ? '' : 'mb-4' }}">
                <div class="">
                    <a href="{{ $user->path() }}" class="flex items-center">
                        <img src="{{ $user->avatar }}" alt="{{ $user->username }}" class="block rounded-full" width="40" height="40">
                        <div class="ml-4 text-sm">
                            {{ $user->name }}
                        </div>
                    </a>
                </div>
            </li>
        @empty
            <li class="">No friends yet!</li>
        @endforelse
    </ul>
</div>

