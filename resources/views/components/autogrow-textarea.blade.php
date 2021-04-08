{{-- 
    <x-autogrow-textarea
        name="body" 
        id="" 
        class="focus:outline-none"
        rows="1" 
        placeholder="What's happening?"
        text-classes="text-xl"
    />
--}}

@props([
    'textClasses' => null
])

<div class="grow-wrap {{ $textClasses }}">
    <textarea  
        {{ $attributes }}
        onInput="this.parentNode.dataset.replicatedValue = this.value"
    ></textarea>
</div>