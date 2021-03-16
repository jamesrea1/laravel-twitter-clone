<div class="border border-gray-300 rounded-xl [ divide-y divide-gray-300 ]">
    @forelse ($tweets as $tweet)
        @include('_tweet')
    @empty
        <p class="my-4 mx-6">No tweets yet!</p>    
    @endforelse
</div>
