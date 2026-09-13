@props([
    'items' => [],
    'valueKey' => 'value',
    'labelKey' => 'label',
    'selected' => null,
    'placeholder' => null,
    'name' => null,
])

@php
    $selectedValue = $name ? old($name, $selected) : $selected;
@endphp

@if($placeholder)
    <option value="">{{ $placeholder }}</option>
@endif

@foreach($items as $item)
    @php
        $value = is_array($item) ? ($item[$valueKey] ?? ($item[$labelKey] ?? $item)) : $item;
        $label = is_array($item) ? ($item[$labelKey] ?? $value) : $item;
        $isSelected = is_array($selectedValue)
            ? in_array($value, $selectedValue, true)
            : ($selectedValue !== null && (string) $selectedValue === (string) $value);
    @endphp

    <option value="{{ $value }}" @selected($isSelected)>{{ $label }}</option>
@endforeach