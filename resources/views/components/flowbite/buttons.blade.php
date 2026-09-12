@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'disabled' => false,
    'href' => null,
    'full' => false,
])

@php
    $variants = [
        'primary' => 'bg-brand text-white hover:bg-brand-strong focus:ring-blue-300',
        'secondary' => 'bg-neutral-primary border border-default text-heading hover:bg-neutral-secondary-medium focus:ring-gray-300',
        'outline' => 'border border-default text-body hover:bg-neutral-secondary-medium hover:text-heading focus:ring-gray-200',
        'danger' => 'bg-danger text-white hover:bg-danger-strong focus:ring-rose-300',
        'success' => 'bg-success text-white hover:bg-success-strong focus:ring-emerald-300',
        'ghost' => 'text-body hover:bg-neutral-secondary-medium hover:text-heading focus:ring-gray-200',
    ];

    $sizes = [
        'sm' => 'px-3 py-2 text-xs',
        'md' => 'px-5 py-2.5 text-sm',
        'lg' => 'px-6 py-3 text-base',
    ];

    $classes = 'inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-base font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ' . $variants[$variant] . ' ' . $sizes[$size] . ($full ? ' w-full' : '');
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" @disabled($disabled) {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif