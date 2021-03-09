<div class="bg-blue-100 rounded-lg p-6 pt-4 pr-20">
    
    <h2 class="text-2xl mb-5 font-bold">Following</h2>
    
    @foreach($follows as $follow )
        <div class="flex mb-4 items-center">
            <img src="{{ $follow->avatar }}" alt="Profile Pic" class="w-10 h-10 block rounded-full">
            <div class="ml-4 ">
                {{ $follow->name }}
            </div>
        </div>
    @endforeach

</div>

