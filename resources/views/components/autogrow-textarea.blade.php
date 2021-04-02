@props([
    'textClasses' => null
])

<div class="grow-wrap {{ $textClasses }}">
    <textarea 
        {{ $attributes }}
        onInput="this.parentNode.dataset.replicatedValue = this.value"
    ></textarea>
</div>