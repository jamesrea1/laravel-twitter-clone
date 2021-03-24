@props([
    'label'
])

<div class="floating">
    <input 
        class="floating__input" 
        {{ $attributes }}
    >
    <label 
        for="{{ $attributes->get('id') }}" 
        class="floating__label" 
        data-content="{{ $label }}" 
    >
        <span class="hidden--visually">
            {{ $label }}
        </span>
    </label>
</div>


{{-- 
    Example
    <x-form-input-floating 
        id="name"
        name="name"
        label="Name"
        placeholder="Name"
        type="text"
        value="" 
    /> 
--}}

