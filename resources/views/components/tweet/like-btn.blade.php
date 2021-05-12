@props([
    'tweet',
    'likeId' => null
])

<button  data-like-id="{{ $likeId ?: ''}}" type="submit" class="js-tweetLikeBtn inline-flex items-center group cursor-pointer {{ $likeId ? 'text-twrose' : 'text-bluegray-500' }}   ">
    <div class="w-9 h-9 flex items-center justify-center rounded-full transition duration-200
        group-hover:text-twrose group-hover:bg-twrose group-hover:bg-opacity-10
    ">
        <svg class="js-liked w-5 h-5 {{ !$likeId ? 'hidden' : '' }}" fill="currentColor" viewBox="0 0 24 24" ><g><path d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12z"></path></g></svg>
        <svg class="js-notLiked w-5 h-5 {{ $likeId ? 'hidden' : '' }}" fill="currentColor" viewBox="0 0 24 24"><g><path d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path></g></svg>    
    
    </div>
    <span class="js-likes text-xs ml-1 mr-2 group-hover:text-twrose transition duration-200" style="min-width:20px">{{ $tweet->likes }} </span>
</button> 
