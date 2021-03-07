

<div class="bg-blue-100 rounded-lg p-6 pt-4 pr-20">
    
    <h2 class="text-2xl mb-5 font-bold">Friends</h2>
    
    @foreach(range(1,10) as $num )
        <div class="flex mb-4 items-center">
            <img src="https://i.pravatar.cc/40?img={{ $num*3 }}" alt="Profile Pic" class="w-10 h-10 block rounded-full">
            <div class="ml-4 ">
                John Doe
            </div>
        </div>
    @endforeach

</div>

