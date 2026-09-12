@props([
    'variant' => 'info',
    'message' => 'Change a few things up and try submitting again'
])

@php
    $class = [
        'info' => 'p-4 mb-4 text-sm text-fg-brand-strong rounded-base bg-brand-softer',
        'danger' => 'p-4 mb-4 text-sm text-fg-danger-strong rounded-base bg-danger-soft',
        'success' => 'p-4 mb-4 text-sm text-fg-success-strong rounded-base bg-success-soft',
        'warning' => 'p-4 mb-4 text-sm text-fg-warning rounded-base bg-warning-soft',
        'dark' => 'p-4 text-sm text-heading rounded-base bg-neutral-secondary-medium'
    ];
@endphp

<div class="{{ $class[$variant] }}">
    {{ $message }}
</div>
