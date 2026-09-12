@props([
    'id' => null,
    'title' => null,
    'size' => 'md',
    'closable' => true,
])

@php
    $id = $id ?? 'modal-' . uniqid();

    $sizes = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-2xl',
    ];
@endphp

<button type="button" data-modal-target="{{ $id }}" data-modal-toggle="{{ $id }}"
    {{ $attributes->merge(['class' => 'inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-base bg-brand px-5 py-2.5 text-sm font-medium text-white transition-colors hover:bg-brand-strong focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2']) }}>
    @isset($trigger)
        {{ $trigger }}
    @else
        {{ $title ?? 'Open modal' }}
    @endisset
</button>

<div id="{{ $id }}" tabindex="-1" aria-hidden="true"
    class="hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full overflow-x-hidden overflow-y-auto md:inset-0">
    <div class="relative p-4 w-full {{ $sizes[$size] }} max-h-full">
        <div class="relative flex flex-col rounded-base border border-default bg-neutral-primary shadow-xs">
            @if($title || isset($header))
                <div class="flex items-start justify-between gap-4 rounded-t-base border-b border-default p-4 md:p-5">
                    <h3 class="text-lg font-semibold text-heading">
                        {{ $header ?? $title }}
                    </h3>
                    @if($closable)
                        <button type="button" data-modal-hide="{{ $id }}"
                            class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-base text-body transition-colors hover:bg-neutral-secondary-medium hover:text-heading focus:outline-none focus:ring-2 focus:ring-ring"
                            aria-label="Close">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                            </svg>
                        </button>
                    @endif
                </div>
            @endif

            <div class="p-4 md:p-5">
                {{ $slot }}
            </div>

            @isset($footer)
                <div class="flex flex-col gap-2 rounded-b-base border-t border-default p-4 md:flex-row md:items-center md:justify-end md:p-5">
                    {{ $footer }}
                </div>
            @endisset
        </div>
    </div>
</div>