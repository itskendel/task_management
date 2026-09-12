@props([
    'label' => 'Dropdown',
    'placement' => null,
    'variant' => 'secondary',
    'items' => [],
])

@php
    $id = 'dropdown-' . uniqid();

    $variants = [
        'primary' => 'bg-brand text-white hover:bg-brand-strong focus:ring-ring',
        'secondary' => 'bg-neutral-primary border border-default text-heading hover:bg-neutral-secondary-medium focus:ring-ring',
        'outline' => 'border border-default text-body hover:bg-neutral-secondary-medium hover:text-heading focus:ring-ring',
        'ghost' => 'text-body hover:bg-neutral-secondary-medium hover:text-heading focus:ring-ring',
    ];
@endphp

<div class="relative inline-block text-left">
    <button type="button" data-dropdown-toggle="{{ $id }}"
        @if($placement) data-dropdown-placement="{{ $placement }}" @endif
        aria-haspopup="true" aria-expanded="false"
        {{ $attributes->merge(['class' => 'inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-base px-5 py-2.5 text-sm font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 ' . $variants[$variant]]) }}
        aria-controls="{{ $id }}">
        @isset($trigger)
            {{ $trigger }}
        @else
            {{ $label }}
        @endisset
        <svg class="w-3 h-3 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 9-7 7-7-7" />
        </svg>
    </button>

    <div id="{{ $id }}"
        class="z-10 hidden w-44 min-w-max divide-y divide-default rounded-base border border-default bg-neutral-primary shadow-xs">
        @if($items)
            <ul class="py-2 text-sm text-body" aria-labelledby="{{ $id }}">
                @foreach($items as $item)
                    <li>
                        <a href="{{ $item['href'] ?? '#' }}" role="menuitem"
                            class="block px-4 py-2 hover:bg-neutral-secondary-medium hover:text-heading whitespace-nowrap">
                            {{ $item['label'] ?? $item }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            {{ $slot }}
        @endif
    </div>
</div>