@extends('layouts.app')


@section('content')
    
    <div class="">
        @include('_sidebar-links')
    </div>

    <div class="flex-grow mx-20">
        @include ('_publish-tweet-panel')

        <div class="border border-gray-200 rounded-lg mt-8">
            @foreach (range(1,10) as $tweet)
                @include('_tweet')
            @endforeach
        </div>
    </div>
    
    <div class="flex-shrink-0   ">
        @include('_friends-list')
    </div>

@endsection
