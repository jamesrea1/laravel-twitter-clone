@props([
    'label' => null,
    'value' => '',
    'hasError' => false
])

<div class="mb-4 flex flex-col">
    @if($label)
        <label for="{{ $attributes->get('id') }}"
            class="text-sm uppercase font-bold mb-2 text-bluegray-700"
        >
            {{ $label }}
        </label>
    @endif

    <input value="{{ old($attributes->get('name')) ?? $value }}"
        {{ 
            $attributes->class([
                'border-red-600 focus:ring-red-600' => $hasError,
                'border-bluegray-400 focus:ring-bluegray-400' => !$hasError
            ])->merge(['class' => 'border rounded px-3 py-2 focus:outline-none focus:ring-1'])
        }}
    >

    @error($attributes->get('name'))
        <span class="mt-1 text-sm text-red-600 font-bold" role="alert">
            {{ $message }}
        </span>
    @enderror     
    
</div>
