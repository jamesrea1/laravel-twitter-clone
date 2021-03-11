<div class="border border-gray-300 rounded-xl [ divide-y divide-gray-300 ]">
    @foreach ($tweets as $tweet)
        @include('_tweet')
    @endforeach
</div>
