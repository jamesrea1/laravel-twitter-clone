<div class="bg-gray-200 rounded-lg py-4 px-6">
    
    <h2 class="text-2xl mb-5 font-bold">Following</h2>
    
    @foreach(auth()->user()->follows as $user )
        <div class="flex mb-4 items-center">
            <img src="{{ $user->avatar }}" alt="Profile Pic" class="w-10 h-10 block rounded-full">
            <div class="ml-4 ">
                {{ $user->name }}
            </div>
        </div>
    @endforeach

</div>

