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
            <img src="{{ current_user()->avatar }}" alt="" class="rounded-full block" width="40" height="40">
            <button type="submit" class="bg-lightblue-500 text-white rounded-lg shadow px-4 py-2" >Tweet-a-roo!</button>
        </div>
    </form>
</div>

