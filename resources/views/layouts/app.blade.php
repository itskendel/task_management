<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Taskly — a minimal task management workspace">
    <title>Task Management</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Geist+Mono:wght@400;500&display=swap">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-neutral-secondary-soft text-body antialiased">
    <x-application.header />

    <x-application.sidebar />

    <main class="h-auto p-4 mt-14 md:ml-64 md:p-6">
        <div class="space-y-4">
            <x-flowbite.breadcrumb />

            {{-- page title and description --}}
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-heading">
                        @yield('page_title')
                    </h1>

                    <p class="mt-1 text-sm text-body-subtle">
                        @yield('page_desc')
                    </p>
                </div>

                <div class="flex flex-wrap gap-1 md:shrink-0">
                    @yield('page_navigation')
                </div>
            </div>

            <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
                @yield('content')
            </div>
        </div>
    </main>

    @livewireScripts
</body>

</html>
