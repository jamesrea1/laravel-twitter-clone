<div class="bg-bluegray-100 rounded-xl py-4 px-6">
    
    <h3 class="text-xl mb-5 font-bold">Friends</h3>
    
    <ul>
        @foreach(current_user()->follows as $user )
            <li class="mb-4">
                <div class="">
                    <a href="{{ $user->path() }}" class="flex items-center">
                        <img src="{{ $user->avatar }}" alt="Profile Pic" class="block rounded-full" width="40" height="40">
                        <div class="ml-4 text-sm">
                            {{ $user->name }}
                        </div>
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
    
</div>

