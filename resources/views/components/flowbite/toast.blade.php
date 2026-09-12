@props([
    'id' => null,
    'variant' => 'success',
    'message' => 'This is a toast message.',
    'position' => 'top-right',
])

@php
    $id = $id ?? 'toast-' . uniqid();

    $variants = [
        'success' => ['icon' => 'bg-success-soft text-fg-success', 'path' => 'm14.5 8.5-4.6 4.6L7.5 10.7'],
        'danger' => ['icon' => 'bg-danger-soft text-fg-danger', 'path' => 'M12 8v4m0 4h.01M3 4h10l8 8-9 9-10-9V4Z'],
        'warning' => ['icon' => 'bg-warning-soft text-fg-warning', 'path' => 'M12 8v9m0 3.5h.01'],
        'info' => ['icon' => 'bg-brand-softer text-fg-brand', 'path' => 'M12 9h.01M11 12h1v4h.01'],
    ];

    $positions = [
        'top-right' => 'top-4 right-4',
        'top-left' => 'top-4 left-4',
        'bottom-right' => 'bottom-4 right-4',
        'bottom-left' => 'bottom-4 left-4',
    ];

    $icon = $variants[$variant] ?? $variants['success'];
@endphp

<div id="{{ $id }}" role="alert" {{ $attributes->merge(['class' => 'fixed z-50 flex ' . $positions[$position] . ' w-[calc(100%-2rem)] max-w-sm items-center p-4 rounded-base border border-default bg-neutral-primary text-body shadow-sm']) }}>
    <div class="{{ $icon['icon'] }} inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-base">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
            viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="{{ $icon['path'] }}" />
        </svg>
        <span class="sr-only">{{ $variant }}</span>
    </div>
    <div class="ms-3 text-sm font-normal">
        {{ $message }}
    </div>
    <button type="button" data-dismiss-target="#{{ $id }}" aria-label="Close"
        class="ms-auto -mx-1.5 -my-1.5 inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-base bg-neutral-primary p-1.5 text-body-subtle transition-colors hover:bg-neutral-secondary-medium hover:text-heading focus:outline-none focus:ring-2 focus:ring-gray-300">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
            viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18 17.94 6M18 18 6.06 6" />
        </svg>
    </button>
</div>