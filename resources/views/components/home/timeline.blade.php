@props([
    'tweets', 
])

<div class="[ divide-y divide-gray-200 ] border-b border-gray-200">
    @forelse ($tweets as $tweet)
        @include('partials/_tweet')
    @empty
        <p class="my-4 mx-6">No tweets yet!</p>    
    @endforelse
</div>
<div class="py-4 mx-auto bg-bluegray-50">{{ $tweets->onEachSide(2)->links() }}</div>
