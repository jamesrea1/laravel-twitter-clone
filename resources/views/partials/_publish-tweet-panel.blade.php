<div class="border-lightblue-400 border rounded-xl mb-8 p-8">
    <form action="{{ url('tweets') }}" method="POST">
        @csrf
        <textarea 
            class="w-full resize-y border-0 border-b border-gray-200"
            name="body"
            rows="3"
            placeholder="What's Up Doc?"
            required
        ></textarea>
        @error('body')
            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
        @enderror
        <div class="flex justify-between mt-4">
            <img src="{{ current_user()->avatar }}" alt="{{ current_user()->username }}" class="rounded-full block object-cover flex-grow-0 w-14 h-14" >
            <button type="submit" class="bg-twitter hover:opacity-80 text-white rounded-full shadow text-lg px-8 pt-2 pb-2.5 self-center" >Publish</button>
        </div>
    </form>
</div>

