@props([
    'items' => [],
    'valueKey' => 'value',
    'labelKey' => 'label',
    'selected' => null,
    'placeholder' => null,
])

@if($placeholder)
    <option value="">{{ $placeholder }}</option>
@endif

@foreach($items as $item)
    @php
        $value = is_array($item) ? ($item[$valueKey] ?? ($item[$labelKey] ?? $item)) : $item;
        $label = is_array($item) ? ($item[$labelKey] ?? $value) : $item;
        $isSelected = is_array($selected)
            ? in_array($value, $selected, true)
            : ($selected !== null && (string) $selected === (string) $value);
    @endphp

    <option value="{{ $value }}" @selected($isSelected)>{{ $label }}</option>
@endforeach