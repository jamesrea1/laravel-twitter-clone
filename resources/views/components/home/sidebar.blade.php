@props([
    'whoToFollow' => null
])

<div class="bg-white py-1 h-14 fixed top-0" style="width: 350px;">
    <div class="flex items-center h-full rounded-full text-bluegray-500" style="background-color: #EBEEF0;">
        <svg viewBox="0 0 24 24" class="w-4 h-4 mx-5 flex-shrink-0" fill="currentColor" style="transform: scale(1.15)"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
        <input type="text" class="bg-transparent border-0 h-full w-full placeholder-bluegray-500" placeholder="Search Twitter">
    </div>
</div>

<div class="pt-3 sticky top-14">
    <div class="mb-4 overflow-hidden rounded-2xl bg-bluegray-50">
        <div class="px-4 py-2.5">
            <h2 class="text-xl font-extrabold">Who to follow</h2>
        </div>
        <div class="border-t border-b border-gray-200 [ divide-y divide-gray-200 ]">
            
            @forelse ($whoToFollow as $user)

                <div class="flex px-4 py-3 items-center">
                    <div class="mr-1 flex-shrink-0">        
                        <a href="">
                            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-full mr-2" width="50" height="50">
                        </a>
                    </div>
                    <div class="flex-auto min-w-0">
                        <a href="" class="font-bold block">
                            <div class="truncate">{{ $user->name }}</div>
                            <div class="text-bluegray-500 font-normal truncate">{{ '@'.$user->username }}</div>
                        </a>
                    </div>
                    <div class="flex-shrink-0 ml-1">
                        <a href="" class="inline-block px-3.5 py-1.5 rounded-full font-bold border border-gray-300 ">Follow</a>
                    </div>
                </div>
            
            @empty

                <p>Check again soon!</p>
                
            @endforelse
            
            
        </div>
        <div>
            <a href="" class="block px-4 py-4 hover:bg-bluegray-200 text-twitter ">Show More</a>
        </div>
    </div>
</div>