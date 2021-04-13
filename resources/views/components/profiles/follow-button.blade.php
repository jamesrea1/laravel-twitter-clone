@if(current_user()->isNot($user))
    <form action="/profiles/{{ $user->username }}/follows" method="post" class="ml-3">
        @csrf
        <button type="submit" class="rounded-full text-white bg-twitter py-2 px-6 text-sm tracking-wide shadow-lg">
            {{ current_user()->following($user) ? 'Unfollow Me' : 'Follow Me' }}
        </button>
    </form>
@endif