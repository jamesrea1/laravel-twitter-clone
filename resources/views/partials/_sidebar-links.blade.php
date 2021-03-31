<ul>
    <li><a
            class="font-bold text-lg mb-4 block" style="color:#E72F82;"
            href="{{ route('home') }}"
        >Home</a></li>
    <li><a
            class="font-bold text-lg mb-4 block" style="color:#E72F82;"
            href="/explore"
        >Explore</a></li>
    <li><a
            class="font-bold text-lg mb-4 block" style="color:#E72F82;"
            href="#"
        >Notifications</a></li>
    <li><a
            class="font-bold text-lg mb-4 block" style="color:#E72F82;"
            href="#"
        >Messages</a></li>
    <li><a
            class="font-bold text-lg mb-4 block" style="color:#E72F82;"
            href="#"
        >Bookmarks</a></li>
    <li><a
            class="font-bold text-lg mb-4 block" style="color:#E72F82;"
            href="#"
        >Lists</a></li>
    <li><a
            class="font-bold text-lg mb-4 block" style="color:#E72F82;"
            href="{{ current_user()->path() }}"
        >Profile</a></li>
    <li><a
            class="font-bold text-lg mb-4 block" style="color:#E72F82;"
            href="#"
        >More</a></li>
    <li>
        <form action="/logout" method="POST">
            @csrf
            <button class="font-bold text-lg block" style="color:#E72F82;">Logout</button>
        </form>
    </li>
</ul>