<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @fonts

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-neutral-primary-soft text-body antialiased">
    <main class="mx-auto max-w-6xl space-y-12 px-4 py-10 md:px-6 lg:px-8">
        <header class="space-y-2 border-b border-default pb-6">
            <h1 class="text-2xl font-semibold text-heading md:text-3xl">Flowbite Components</h1>
            <p class="text-sm text-body-subtle md:text-base">A living preview of the adaptive Blade components.</p>
            <x-flowbite.breadcrumb />
        </header>

        {{-- Alerts --}}
        <section class="space-y-3">
            <h2 class="text-lg font-semibold text-heading md:text-xl">Alerts</h2>
            <x-flowbite.alerts variant="info" message="This is an info alert — check out this new feature!" />
            <x-flowbite.alerts variant="success" message="Your task was saved successfully." />
            <x-flowbite.alerts variant="warning" message="Please review your pending assignments." />
            <x-flowbite.alerts variant="danger" message="Something went wrong. Try again later." />
            <x-flowbite.alerts variant="dark" message="Heads up — maintenance is scheduled tonight." />
        </section>

        {{-- Badges --}}
        <section class="space-y-3">
            <h2 class="text-lg font-semibold text-heading md:text-xl">Badges</h2>
            <div class="flex flex-wrap gap-2">
                <x-flowbite.badge variant="info" message="New" />
                <x-flowbite.badge variant="success" message="Completed" />
                <x-flowbite.badge variant="danger" message="Overdue" />
                <x-flowbite.badge variant="warning" message="Pending" />
                <x-flowbite.badge variant="gray" message="Archived" />
                <x-flowbite.badge variant="dark" message="Primary" />
            </div>
        </section>

        {{-- Buttons --}}
        <section class="space-y-3">
            <h2 class="text-lg font-semibold text-heading md:text-xl">Buttons</h2>
            <div class="flex flex-wrap items-center gap-3">
                <x-flowbite.buttons variant="primary">Primary</x-flowbite.buttons>
                <x-flowbite.buttons variant="secondary">Secondary</x-flowbite.buttons>
                <x-flowbite.buttons variant="outline">Outline</x-flowbite.buttons>
                <x-flowbite.buttons variant="danger">Danger</x-flowbite.buttons>
                <x-flowbite.buttons variant="success">Success</x-flowbite.buttons>
                <x-flowbite.buttons variant="ghost">Ghost</x-flowbite.buttons>
                <x-flowbite.buttons variant="primary" size="sm">Small</x-flowbite.buttons>
                <x-flowbite.buttons variant="primary" size="lg">Large</x-flowbite.buttons>
                <x-flowbite.buttons variant="primary" disabled>Disabled</x-flowbite.buttons>
                <x-flowbite.buttons variant="secondary" href="#">Link</x-flowbite.buttons>
                <x-flowbite.buttons variant="primary" full>Full width</x-flowbite.buttons>
            </div>
        </section>

        {{-- Dropdown --}}
        <section class="space-y-3">
            <h2 class="text-lg font-semibold text-heading md:text-xl">Dropdown</h2>
            <div class="flex flex-wrap gap-3">
                <x-flowbite.dropdowns label="Team menu" :items="[['label' => 'Dashboard', 'href' => '#'], ['label' => 'Projects', 'href' => '#'], ['label' => 'Settings', 'href' => '#']]" />
                <x-flowbite.dropdowns label="Account" variant="outline" placement="bottom-end"
                    :items="[['label' => 'Profile', 'href' => '#'], ['label' => 'Sign out', 'href' => '#']]" />
            </div>
        </section>

        {{-- Form elements --}}
        <section class="space-y-5">
            <h2 class="text-lg font-semibold text-heading md:text-xl">Form elements</h2>
            <form class="grid grid-cols-1 gap-4 md:grid-cols-2" onsubmit="return false;">
                <x-flowbite.inputs name="title" label="Task title" placeholder="e.g. Build landing page" required />
                <x-flowbite.select name="status" label="Status" placeholder="Select a status">
                    <x-flowbite.select_options :items="[['value' => 'pending', 'label' => 'Pending'], ['value' => 'progress', 'label' => 'In progress'], ['value' => 'review', 'label' => 'Review'], ['value' => 'completed', 'label' => 'Completed']]" />
                </x-flowbite.select>
                <x-flowbite.inputs name="assignee" label="Assignee" placeholder="Who is working on this?" />
                <x-flowbite.select name="priority" label="Priority">
                    <x-flowbite.select_options :items="[['value' => 'low', 'label' => 'Low'], ['value' => 'medium', 'label' => 'Medium'], ['value' => 'high', 'label' => 'High']]" selected="medium" />
                </x-flowbite.select>
                <x-flowbite.inputs name="due_date" label="Due date" type="date" class="md:col-span-1" />
                <x-flowbite.inputs name="email" label="Email" type="email" placeholder="you@example.com"
                    error="Please provide a valid email address." class="md:col-span-1" />
                <x-flowbite.text-area name="description" label="Description" rows="4"
                    placeholder="Add any extra details..." class="md:col-span-2" />
            </form>
        </section>

        {{-- Table --}}
        <section class="space-y-3">
            <h2 class="text-lg font-semibold text-heading md:text-xl">Table</h2>
            <x-flowbite.table />
        </section>

        {{-- Tabs --}}
        <section class="space-y-3">
            <h2 class="text-lg font-semibold text-heading md:text-xl">Tabs</h2>
            @php
                $tabItems = [
                    ['id' => 'overview', 'label' => 'Overview', 'content' => '<p class="text-body">All tasks in this project are listed here.</p>'],
                    ['id' => 'details', 'label' => 'Details', 'content' => '<p class="text-body">Detailed configuration for your workspace.</p>'],
                    ['id' => 'activity', 'label' => 'Activity', 'content' => '<p class="text-body">Latest changes and notifications.</p>'],
                ];
            @endphp
            <x-flowbite.tabs :tabs="$tabItems" />
        </section>

        {{-- Accordion --}}
        <section class="space-y-3">
            <h2 class="text-lg font-semibold text-heading md:text-xl">Accordion</h2>
            <x-flowbite.accordion>
                <x-flowbite.accordion-item title="What is Flowbite?" expanded="true">
                    <p class="text-body">Flowbite is an open-source library of interactive components built on top of
                        Tailwind CSS.</p>
                </x-flowbite.accordion-item>
                <x-flowbite.accordion-item title="Is it responsive?">
                    <p class="text-body">Yes, every component adapts across mobile, tablet, and desktop breakpoints.</p>
                </x-flowbite.accordion-item>
            </x-flowbite.accordion>
        </section>

        {{-- Modal --}}
        <section class="space-y-3">
            <h2 class="text-lg font-semibold text-heading md:text-xl">Modal</h2>
            <x-flowbite.modal id="example-modal" title="Create a new task">
                <p class="text-body">
                    Enter the task details below. You can change or delete the task at any time.
                </p>
                <x-slot:footer>
                    <x-flowbite.buttons variant="secondary" size="sm" data-modal-hide="example-modal">
                        Cancel
                    </x-flowbite.buttons>
                    <x-flowbite.buttons variant="primary" size="sm">Create task</x-flowbite.buttons>
                </x-slot:footer>
            </x-flowbite.modal>
        </section>

        {{-- Carousel --}}
        <section class="space-y-3">
            <h2 class="text-lg font-semibold text-heading md:text-xl">Carousel</h2>
            <div class="overflow-hidden rounded-base">
                <x-flowbite.carousel />
            </div>
        </section>

        {{-- Toast --}}
        <section class="space-y-3">
            <h2 class="text-lg font-semibold text-heading md:text-xl">Toast</h2>
            <x-flowbite.toast id="welcome-toast" variant="success" message="Welcome back! Everything is synced." />
        </section>
    </main>
</body>

</html>