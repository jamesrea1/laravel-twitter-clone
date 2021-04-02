@props([
    'tweets', 
])

<div class="[ divide-y divide-gray-300 ]">
    @forelse ($tweets as $tweet)
        @include('partials/_tweet')
    @empty
        <p class="my-4 mx-6">No tweets yet!</p>    
    @endforelse
</div>
<div class="mt-8 mx-auto">{{ $tweets->onEachSide(2)->links() }}</div>
