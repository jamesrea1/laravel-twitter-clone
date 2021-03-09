@extends('layouts.app')


@section('content')
    
    <div class="flex justify-between">
        <div class="">
            @include('_sidebar-links')
        </div>

        <div class="flex-grow mx-20 mb-20">
            @include ('_publish-tweet-panel')

            <div class="border border-gray-300 rounded-lg mt-8 [ divide-y divide-gray-300 ]">
                @foreach ($tweets as $tweet)
                    @include('_tweet')
                @endforeach
            </div>
        </div>
        
        <div class="flex-shrink-0">
            @include('_friends-list')
        </div>
    </div>
@endsection
