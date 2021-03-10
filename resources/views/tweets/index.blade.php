@extends('layouts.app')

@section('content')

    @include ('_publish-tweet-panel')
                
    <div class="border border-gray-300 rounded-lg mt-8 [ divide-y divide-gray-300 ]">
        @foreach ($tweets as $tweet)
            @include('_tweet')
        @endforeach
    </div>

@endsection
