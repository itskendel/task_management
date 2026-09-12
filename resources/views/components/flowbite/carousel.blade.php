@props([
    'slides' => [],
])

@php
    $id = 'carousel-' . uniqid();

    $items = $slides;

    if (empty($items)) {
        $items = [
            ['title' => 'Build the landing page', 'subtitle' => 'High priority · Due Sep 20'],
            ['title' => 'Set up authentication', 'subtitle' => 'Medium priority · Due Sep 10'],
            ['title' => 'Design the API schema', 'subtitle' => 'High priority · Due Sep 24'],
            ['title' => 'Write unit tests', 'subtitle' => 'Low priority · Due Oct 02'],
        ];
    }

    $placeholders = [
        'from-brand to-brand-strong',
        'from-success to-success-strong',
        'from-warning to-warning-strong',
        'from-dark to-dark-strong',
    ];
@endphp

<div id="{{ $id }}" class="relative w-full" data-carousel="slide">
    <div class="relative h-56 overflow-hidden rounded-base md:h-96">
        @foreach($items as $index => $item)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                @isset($item['image'])
                    <img src="{{ $item['image'] }}"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="{{ $item['alt'] ?? 'Slide ' . ($index + 1) }}">
                @else
                    <div
                        class="absolute flex w-full flex-col items-center justify-center gap-2 px-6 bg-gradient-to-r {{ $placeholders[$index % count($placeholders)] }}">
                        <h3 class="text-center text-xl font-semibold text-white md:text-2xl">
                            {{ $item['title'] ?? 'Slide ' . ($index + 1) }}
                        </h3>
                        @isset($item['subtitle'])
                            <p class="text-center text-sm text-white/80">{{ $item['subtitle'] }}</p>
                        @endisset
                    </div>
                @endisset
            </div>
        @endforeach
    </div>

    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        @foreach($items as $index => $item)
            <button type="button" class="w-3 h-3 rounded-full" aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
        @endforeach
    </div>

    <button type="button"
        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-base bg-white/40 backdrop-blur-sm group-hover:bg-white/60 group-focus:ring-4 group-focus:ring-ring group-focus:outline-none">
            <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m15 19-7-7 7-7" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button"
        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-base bg-white/40 backdrop-blur-sm group-hover:bg-white/60 group-focus:ring-4 group-focus:ring-ring group-focus:outline-none">
            <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m9 5 7 7-7 7" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>