@props([
    'name' => null,
    'type' => 'text',
    'label' => null,
    'placeholder' => null,
    'value' => null,
    'error' => null,
    'hint' => null,
    'id' => null,
    'required' => false,
    'disabled' => false,
])

@php
    $id = $id ?: ($name ? 'input-' . $name : 'input-' . uniqid());
    $fieldClasses = 'block w-full rounded-base border bg-neutral-primary p-2.5 text-sm text-heading placeholder:text-body-subtle transition-colors focus:outline-none focus:ring-2 ' . ($error ? 'border-danger focus:border-danger focus:ring-danger/30' : 'border-default focus:border-ring focus:ring-ring');
@endphp

<div class="w-full">
    @if($label)
        <label for="{{ $id }}" class="mb-2 block text-sm font-medium {{ $error ? 'text-fg-danger' : 'text-heading' }}">
            {{ $label }}
            @if($required)
                <span class="text-fg-danger">*</span>
            @endif
        </label>
    @endif

    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}" @required($required) @disabled($disabled)
        {{ $attributes->merge(['class' => $fieldClasses]) }}
        aria-invalid="{{ $error ? 'true' : 'false' }}"
        @if($error) aria-describedby="{{ $id }}-error" @endif>

    @if($error)
        <p id="{{ $id }}-error" class="mt-1.5 text-xs text-fg-danger">{{ $error }}</p>
    @elseif($hint)
        <p id="{{ $id }}-hint" class="mt-1.5 text-xs text-body-subtle">{{ $hint }}</p>
    @endif
</div>
