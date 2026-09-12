@props(['title' => 'Title', 'expanded' => 'false'])

@php
    $id = uniqid();
@endphp

<h2 id="accordion-collapse-heading-{{ $id }}">
    <button type="button"
        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-body rounded-t-base border border-t-0 border-x-0 border-b-default hover:text-heading hover:bg-neutral-secondary-medium gap-3"
        data-accordion-target="#accordion-collapse-body-{{ $id }}" aria-expanded="{{ $expanded }}"
        aria-controls="accordion-collapse-body-{{ $id }}">
        <span>{{ $title }}</span>
        <svg data-accordion-icon class="w-5 h-5 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m5 15 7-7 7 7" />
        </svg>
    </button>
</h2>
<div id="accordion-collapse-body-{{ $id }}"
    class="hidden border border-s-0 border-e-0 border-t-0 border-b-default"
    aria-labelledby="accordion-collapse-heading-{{ $id }}">
    <div class="p-4 md:p-5">
        {{ $slot }}
    </div>
</div>
