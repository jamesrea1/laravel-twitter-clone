@if(auth()->user()->isNot($user))
    <form action="/profiles/{{ $user->name }}/follow" method="post" class="ml-3">
        @csrf
        <button type="submit" class="rounded-full text-white bg-lightblue-500 py-2 px-6 text-xs shadow-lg">
            {{ auth()->user()->following($user) ? 'Unfollow Me' : 'Follow Me' }}
        </button>
    </form>
@endif