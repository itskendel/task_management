<nav
    class="fixed left-0 right-0 top-0 z-50 border-b border-default bg-neutral-primary/90 px-4 py-2.5 backdrop-blur-sm">
    <div class="flex flex-wrap items-center justify-between">
        <div class="flex items-center">
            <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                aria-controls="drawer-navigation"
                class="-ml-1.5 mr-2 rounded-base p-2 text-body transition-colors cursor-pointer md:hidden hover:bg-neutral-secondary-medium hover:text-heading focus:outline-none focus:ring-2 focus:ring-ring">
                <span class="sr-only">Toggle sidebar</span>
                <svg aria-hidden="true" class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>

            <a href="{{ url('/') }}" class="flex items-center gap-2.5">
                <span
                    class="flex h-8 w-8 items-center justify-center rounded-base bg-brand text-white transition-colors hover:bg-brand-strong">
                    <svg aria-hidden="true" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="m5 12 5 5L20 7" />
                    </svg>
                </span>
                <span class="self-center text-lg font-semibold tracking-tight text-heading">Taskly</span>
            </a>

            <form action="#" method="GET" class="hidden pl-4 md:block">
                <label for="topbar-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-4 w-4 text-body-subtle" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                            </path>
                        </svg>
                    </div>
                    <input type="text" name="q" id="topbar-search"
                        class="block w-72 rounded-base border border-default bg-neutral-secondary-soft py-2 pl-10 pr-3 text-sm text-heading placeholder:text-body-subtle transition-colors focus:border-ring focus:bg-neutral-primary focus:outline-none focus:ring-2 focus:ring-ring"
                        placeholder="Search tasks, projects..." />
                </div>
            </form>
        </div>

        <div class="flex items-center gap-1">
            <button type="button" data-dropdown-toggle="notification-dropdown"
                class="rounded-base p-2 text-body transition-colors hover:bg-neutral-secondary-medium hover:text-heading focus:outline-none focus:ring-2 focus:ring-ring">
                <span class="sr-only">View notifications</span>
                <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                    </path>
                </svg>
            </button>
            <div id="notification-dropdown"
                class="z-50 my-4 hidden w-72 divide-y divide-default rounded-base border border-default bg-neutral-primary text-body shadow-sm">
                <div class="flex items-center justify-between px-4 py-3">
                    <span class="text-sm font-semibold text-heading">Notifications</span>
                    <span class="rounded-base bg-brand-softer px-2 py-0.5 text-xs font-medium text-heading">3</span>
                </div>
                <ul class="py-1 text-sm">
                    <li>
                        <a href="#"
                            class="flex items-start gap-3 px-4 py-3 transition-colors hover:bg-neutral-secondary-medium">
                            <span
                                class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-base bg-brand-softer text-brand">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                                    </path>
                                </svg>
                            </span>
                            <span>
                                <span class="block font-medium text-heading">Task due today</span>
                                <span class="block text-xs text-body-subtle">"Prepare demo environment" is due in 2
                                    hours.</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-start gap-3 px-4 py-3 transition-colors hover:bg-neutral-secondary-medium">
                            <span
                                class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-base bg-success-soft text-fg-success">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span>
                                <span class="block font-medium text-heading">Task completed</span>
                                <span class="block text-xs text-body-subtle">Maya marked "Set up authentication" as
                                    done.</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-start gap-3 px-4 py-3 transition-colors hover:bg-neutral-secondary-medium">
                            <span
                                class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-base bg-warning-soft text-fg-warning">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span>
                                <span class="block font-medium text-heading">Overdue task</span>
                                <span class="block text-xs text-body-subtle">"Write unit tests" is now past due.</span>
                            </span>
                        </a>
                    </li>
                </ul>
                <a href="#"
                    class="block px-4 py-2.5 text-center text-sm font-medium text-body transition-colors hover:bg-neutral-secondary-medium hover:text-heading">
                    View all notifications
                </a>
            </div>

            <button type="button" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                class="ml-2 flex items-center gap-2 rounded-base p-1 transition-colors hover:bg-neutral-secondary-medium focus:outline-none focus:ring-2 focus:ring-ring md:mr-0">
                <span class="sr-only">Open user menu</span>
                <span
                    class="flex h-8 w-8 items-center justify-center rounded-base bg-brand text-sm font-semibold text-white">KS</span>
                <span class="hidden text-left lg:block">
                    <span class="block text-sm font-medium leading-tight text-heading">Ken Simms</span>
                    <span class="block text-xs leading-tight text-body-subtle">Administrator</span>
                </span>
                <svg class="hidden h-3 w-3 text-body-subtle lg:block" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div id="user-dropdown"
                class="z-50 my-4 hidden w-56 divide-y divide-default rounded-base border border-default bg-neutral-primary text-body shadow-sm">
                <div class="px-4 py-3">
                    <p class="text-sm font-semibold text-heading">Ken Simms</p>
                    <p class="truncate text-sm text-body-subtle">ken@taskly.app</p>
                </div>
                <ul class="py-1 text-sm" aria-labelledby="user-menu-button">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 transition-colors hover:bg-neutral-secondary-medium hover:text-heading">My
                            profile</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 transition-colors hover:bg-neutral-secondary-medium hover:text-heading">Account
                            settings</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 transition-colors hover:bg-neutral-secondary-medium hover:text-heading">Team
                            members</a>
                    </li>
                </ul>
                <ul class="py-1 text-sm" aria-labelledby="user-menu-button">
                    <li>
                        <a href="#"
                            class="flex items-center gap-2.5 px-4 py-2 transition-colors hover:bg-danger-soft hover:text-fg-danger">Sign
                            out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>