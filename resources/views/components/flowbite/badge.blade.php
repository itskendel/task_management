@props([
    'variant' => 'info',
    'message' => 'Brand'
])

@php
    $class = [
        'info' => 'bg-brand-softer text-fg-brand-strong text-xs font-medium px-1.5 py-0.5 rounded',
        'dark' => 'bg-neutral-primary-soft text-heading text-xs font-medium px-1.5 py-0.5 rounded',
        'gray' => 'bg-neutral-secondary-medium text-heading text-xs font-medium px-1.5 py-0.5 rounded',
        'danger' => 'bg-danger-soft text-fg-danger-strong text-xs font-medium px-1.5 py-0.5 rounded',
        'success' => 'bg-success-soft text-fg-success-strong text-xs font-medium px-1.5 py-0.5 rounded',
        'warning' => 'bg-warning-soft text-fg-warning text-xs font-medium px-1.5 py-0.5 rounded',
    ];
@endphp

<span class="{{ $class[$variant] }}">{{ $message }}</span>
