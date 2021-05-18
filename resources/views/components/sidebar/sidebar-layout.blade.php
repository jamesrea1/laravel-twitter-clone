@props([
    'whoToFollow' => null
])

<div class="l-sidebar-header bg-white py-1 h-14 fixed top-0">
    <div class="flex items-center h-full rounded-full  bg-twinput border border-transparent
          focus-within:border-twitter focus-within:bg-white 
    ">
        <svg viewBox="0 0 24 24" class="w-4 h-4 mx-5 flex-shrink-0 text-bluegray-500" fill="currentColor" style="transform: scale(1.15)"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
        <input type="text" 
            class="bg-transparent border-0 h-full w-full placeholder-bluegray-500 focus:outline-none" 
            placeholder="Search Twitter"
            autocomplete="off" 
            autocorrect="off" 
            spellcheck="false" 
        >
        <div class="w-5 h-5 mr-3 rounded-full overflow-hidden flex-shrink-0 
            bg-twitter hover:bg-twdarkblue
            flex justify-center items-center
            hiddenXX
            opacity-25
        ">
            <svg class="w-2.5 h-2.5" fill="white" viewBox="0 0 15 15"><g><path d="M8.914 7.5l5.793-5.793c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0L7.5 6.086 1.707.293c-.39-.39-1.023-.39-1.414 0s-.39 1.023 0 1.414L6.086 7.5.293 13.293c-.39.39-.39 1.023 0 1.414.195.195.45.293.707.293s.512-.098.707-.293L7.5 8.914l5.793 5.793c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L8.914 7.5z"></path></g></svg>
        </div>
    </div>
</div>

<div class="pt-3 sticky top-14">
    <div class="mb-4 overflow-hidden rounded-2xl bg-bluegray-50">
        <div class="px-4 py-2.5">
            <h2 class="text-xl font-extrabold">Who to follow</h2>
        </div>
        <div class="border-t border-b border-twgray150 [ divide-y divide-twgray150 ]">
            
            @forelse ($whoToFollow as $user)
                <x-sidebar.profile-link :user="$user" />
            @empty
                <p>Check again soon!</p>
            @endforelse
            
        </div>
        <div>
            <a href="" class="block px-4 py-4 text-twitter hover:bg-twgray150 transition duration-200">Show More</a>
        </div>
    </div>
</div>