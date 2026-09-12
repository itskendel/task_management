@php
    $id = uniqid();
@endphp

<div id="accordion-collapse-{{ $id }}" data-accordion="collapse"
    class="rounded-base border border-default overflow-hidden shadow-xs">

    {{ $slot }}
</div>
