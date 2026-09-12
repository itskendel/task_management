@props([
    'tabs' => [],
    'active' => null,
    'variant' => 'underline'
])

@php
    $id = 'tabs-' . uniqid();
    $items = $tabs ?: [
        ['id' => 'overview', 'label' => 'Overview', 'content' => 'This is the overview tab.'],
        ['id' => 'details', 'label' => 'Details', 'content' => 'These are the details.'],
        ['id' => 'activity', 'label' => 'Activity', 'content' => 'Recent activity goes here.']
    ];

    if ($active === null && isset($items[0]['id'])) {
        $active = $items[0]['id'];
    }

    $variants = [
        'underline' => [
            'container' => 'flex flex-wrap -mb-px gap-x-2 border-b border-default text-sm font-medium text-center',
            'button' =>
                'inline-block p-4 border-b-2 rounded-t-base transition-colors focus:outline-none focus:ring-2 focus:ring-brand/30',
            'active' => 'text-fg-brand border-brand',
            'inactive' => 'border-transparent text-body hover:text-heading hover:border-default',
            'panel' => 'p-4'
        ],
        'pills' => [
            'container' => 'flex flex-wrap gap-2 text-sm font-medium',
            'button' =>
                'inline-flex items-center justify-center px-4 py-2 rounded-base transition-colors focus:outline-none focus:ring-2 focus:ring-brand/30',
            'active' => 'bg-brand text-white',
            'inactive' => 'text-body hover:text-heading hover:bg-neutral-secondary-medium',
            'panel' => 'p-4'
        ]
    ];
@endphp

<div class="w-full">
    <ul class="{{ $variants[$variant]['container'] }}" role="tablist" data-tabs-toggle="#{{ $id }}-content"
        data-tabs-active-classes="{{ $variants[$variant]['active'] }}"
        data-tabs-inactive-classes="{{ $variants[$variant]['inactive'] }}">
        @foreach ($items as $index => $tab)
            @php
                $tabId = $tab['id'] ?? 'tab-' . $index;
                $label = $tab['label'] ?? $tabId;
                $isActive = $active === $tabId;
            @endphp
            <li role="presentation">
                <button type="button" role="tab" id="{{ $id }}-{{ $tabId }}-tab"
                    data-tabs-target="#{{ $id }}-{{ $tabId }}"
                    aria-controls="{{ $id }}-{{ $tabId }}"
                    aria-selected="{{ $isActive ? 'true' : 'false' }}"
                    class="{{ $variants[$variant]['button'] }} {{ $isActive ? $variants[$variant]['active'] : $variants[$variant]['inactive'] }}">
                    {{ $label }}
                </button>
            </li>
        @endforeach
    </ul>

    <div id="{{ $id }}-content" class="mt-2 w-full">
        @foreach ($items as $index => $tab)
            @php
                $tabId = $tab['id'] ?? 'tab-' . $index;
                $isActive = $active === $tabId;
            @endphp
            <div id="{{ $id }}-{{ $tabId }}" role="tabpanel"
                aria-labelledby="{{ $id }}-{{ $tabId }}-tab"
                class="{{ $variants[$variant]['panel'] }} {{ $isActive ? '' : 'hidden' }}">
                {!! $tab['content'] ?? '' !!}
            </div>
        @endforeach
    </div>
</div>
