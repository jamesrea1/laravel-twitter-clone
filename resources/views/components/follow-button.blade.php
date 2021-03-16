@if(current_user()->isNot($user))
    <form action="/profiles/{{ $user->name }}/follow" method="post" class="ml-3">
        @csrf
        <button type="submit" class="rounded-full text-white bg-twitter py-2 px-6 text-xs shadow-lg">
            {{ current_user()->following($user) ? 'Unfollow Me' : 'Follow Me' }}
        </button>
    </form>
@endif