<aside aria-label="Sidenav" id="drawer-navigation"
    class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r border-default bg-neutral-primary pt-14 transition-transform md:translate-x-0">
    <div class="flex h-full flex-col overflow-y-auto bg-neutral-primary px-3 py-4">
        <form action="#" method="GET" class="mb-3 md:hidden">
            <label for="sidebar-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-4 w-4 text-body-subtle" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                        </path>
                    </svg>
                </div>
                <input type="text" name="search" id="sidebar-search"
                    class="block w-full rounded-base border border-default bg-neutral-secondary-soft py-2 pl-10 pr-3 text-sm text-heading placeholder:text-body-subtle transition-colors focus:border-ring focus:bg-neutral-primary focus:outline-none focus:ring-2 focus:ring-ring"
                    placeholder="Search" />
            </div>
        </form>

        <nav class="flex-1 space-y-6">
            <div>
                <p class="mb-2 px-3 text-xs font-medium uppercase tracking-wider text-body-subtle">Workspace</p>
                <ul class="space-y-1">
                    <li>
                        <a href="#"
                            class="group flex items-center gap-3 rounded-base bg-neutral-secondary-medium px-3 py-2 text-sm font-medium text-heading transition-colors hover:bg-neutral-secondary-medium">
                            <svg aria-hidden="true" class="h-5 w-5 shrink-0 text-heading" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <button type="button"
                            class="group flex w-full items-center gap-3 rounded-base px-3 py-2 text-sm font-medium text-body transition-colors hover:bg-neutral-secondary-medium hover:text-heading"
                            aria-controls="dropdown-projects" data-collapse-toggle="dropdown-projects">
                            {{-- <svg aria-hidden="true" class="h-5 w-5 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4 4a2 2 0 012-2h8a2 2 0 012 2v1h1a1 1 0 100-2H5a1 1 0 100 2h1v1a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm4 5a1 1 0 100 2h8a1 1 0 100-2H8zm-1 5a1 1 0 011-1h8a1 1 0 110 2H8a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg> --}}
                            <span class="flex-1 text-left">Projects</span>
                            <svg aria-hidden="true" class="h-4 w-4 shrink-0 transition-transform" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="dropdown-projects" class="hidden space-y-1 py-1">
                            <li>
                                <a href="#"
                                    class="flex items-center rounded-base py-1.5 pl-11 pr-3 text-sm text-body transition-colors hover:bg-neutral-secondary-medium hover:text-heading">Create
                                    Project</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center rounded-base py-1.5 pl-11 pr-3 text-sm text-body transition-colors hover:bg-neutral-secondary-medium hover:text-heading">Active
                                    Project</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center rounded-base py-1.5 pl-11 pr-3 text-sm text-body transition-colors hover:bg-neutral-secondary-medium hover:text-heading">Archieve
                                    Project</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button type="button"
                            class="group flex w-full items-center gap-3 rounded-base px-3 py-2 text-sm font-medium text-body transition-colors hover:bg-neutral-secondary-medium hover:text-heading"
                            aria-controls="dropdown-tasks" data-collapse-toggle="dropdown-tasks">
                            {{-- <svg aria-hidden="true" class="h-5 w-5 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4 4a2 2 0 012-2h8a2 2 0 012 2v1h1a1 1 0 100-2H5a1 1 0 100 2h1v1a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm4 5a1 1 0 100 2h8a1 1 0 100-2H8zm-1 5a1 1 0 011-1h8a1 1 0 110 2H8a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg> --}}
                            <span class="flex-1 text-left">Tasks</span>
                            <svg aria-hidden="true" class="h-4 w-4 shrink-0 transition-transform" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="dropdown-tasks" class="hidden space-y-1 py-1">
                            {{-- <li>
                                <a href="#"
                                    class="flex items-center rounded-base py-1.5 pl-11 pr-3 text-sm text-body transition-colors hover:bg-neutral-secondary-medium hover:text-heading">All
                                    tasks</a>
                            </li> --}}
                            <li>
                                <a href="#"
                                    class="flex items-center rounded-base py-1.5 pl-11 pr-3 text-sm text-body transition-colors hover:bg-neutral-secondary-medium hover:text-heading">My
                                    Tasks</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center rounded-base py-1.5 pl-11 pr-3 text-sm text-body transition-colors hover:bg-neutral-secondary-medium hover:text-heading">Upcoming</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"
                            class="group flex items-center gap-3 rounded-base px-3 py-2 text-sm font-medium text-body transition-colors hover:bg-neutral-secondary-medium hover:text-heading">
                            {{-- <svg aria-hidden="true" class="h-5 w-5 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M13.586 3.586A2 2 0 0012.172 3H7.828a2 2 0 00-1.414.586L3.586 6.414A2 2 0 003 7.828V14a2 2 0 002 2h10a2 2 0 002-2V7.828a2 2 0 00-.586-1.414l-2.828-2.828zM8 2.25A3.75 3.75 0 0 1 11.75 6h.25a2 2 0 012 2v1.5a.75.75 0 001.5 0V8a3.5 3.5 0 00-3.5-3.5 3.75 3.75 0 00-7.5 0A3.5 3.5 0 002.5 8v1.5a.75.75 0 001.5 0V8a2 2 0 012-2h3.25A3.75 3.75 0 008 2.25z"
                                    clip-rule="evenodd"></path>
                            </svg> --}}
                            <span>Team</span>
                            <span
                                class="ml-auto inline-flex h-5 min-w-5 items-center justify-center rounded-full bg-brand-softer px-1.5 text-xs font-medium text-heading">8</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group flex items-center gap-3 rounded-base px-3 py-2 text-sm font-medium text-body transition-colors hover:bg-neutral-secondary-medium hover:text-heading">
                            {{-- <svg aria-hidden="true" class="h-5 w-5 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg> --}}
                            <span>Reports</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <p class="mb-2 px-3 text-xs font-medium uppercase tracking-wider text-body-subtle">More</p>
                <ul class="space-y-1">
                    <li>
                        <a href="#"
                            class="group flex items-center gap-3 rounded-base px-3 py-2 text-sm font-medium text-body transition-colors hover:bg-neutral-secondary-medium hover:text-heading">
                            {{-- <svg aria-hidden="true" class="h-5 w-5 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"></path>
                            </svg> --}}
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group flex items-center gap-3 rounded-base px-3 py-2 text-sm font-medium text-body transition-colors hover:bg-neutral-secondary-medium hover:text-heading">
                            {{-- <svg aria-hidden="true" class="h-5 w-5 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                                </path>
                            </svg> --}}
                            <span>Help center</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="mt-6 border-t border-default pt-4">
            <div class="rounded-base border border-default bg-neutral-secondary-soft p-3">
                <div class="flex items-center gap-2">
                    <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-base bg-brand text-white">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6zm4 4a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <div>
                        <p class="text-sm font-medium text-heading">Sprint 24</p>
                        <p class="text-xs text-body-subtle">Ends in 5 days</p>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="flex items-center justify-between text-xs text-body-subtle">
                        <span>21 of 28 tasks done</span>
                        <span class="font-medium text-heading">75%</span>
                    </div>
                    <div class="mt-1.5 h-1.5 w-full overflow-hidden rounded-full bg-neutral-tertiary-medium">
                        <div class="h-full rounded-full bg-brand" style="width: 75%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
