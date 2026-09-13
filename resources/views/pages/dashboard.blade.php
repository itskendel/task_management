@extends('layouts.app')

@section('content')
    <div class="space-y-8">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="mt-3 text-3xl font-semibold tracking-tight text-heading">Dashboard</h1>
                <p class="mt-1 text-sm text-body-subtle">An overview of your projects and recent progress.</p>
            </div>
            <div class="flex items-center gap-2">
                <x-flowbite.dropdowns label="This month">
                    <ul class="py-1 text-sm text-body">
                        <li><a href="#"
                                class="block px-4 py-2 hover:bg-neutral-secondary-medium hover:text-heading">This month</a>
                        </li>
                        <li><a href="#"
                                class="block px-4 py-2 hover:bg-neutral-secondary-medium hover:text-heading">Last 90
                                days</a></li>
                        <li><a href="#"
                                class="block px-4 py-2 hover:bg-neutral-secondary-medium hover:text-heading">Year to
                                date</a>
                        </li>
                    </ul>
                </x-flowbite.dropdowns>

                <x-flowbite.modal id="request-modal" title="Submit a new request" size="lg">
                    <x-slot name="trigger">
                        New request
                    </x-slot>

                    <div class="space-y-4">
                        <x-flowbite.inputs name="subject" label="Request subject" placeholder="What do you need?"
                            required />
                        <x-flowbite.select name="type" label="Request type">
                            <x-flowbite.select_options :items="[
                                ['value' => 'support', 'label' => 'Support'],
                                ['value' => 'feature', 'label' => 'New feature'],
                                ['value' => 'bug', 'label' => 'Bug fix'],
                                ['value' => 'consultation', 'label' => 'Consultation']
                            ]" selected="support" />
                        </x-flowbite.select>
                        <x-flowbite.text-area name="details" label="Details" rows="4"
                            placeholder="Describe what you need in a little more detail..." />
                    </div>

                    <x-slot name="footer">
                        <x-flowbite.buttons variant="secondary" data-modal-hide="request-modal">Cancel
                        </x-flowbite.buttons>
                        <x-flowbite.buttons variant="primary" type="submit">Send request</x-flowbite.buttons>
                    </x-slot>
                </x-flowbite.modal>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
                <span class="text-sm font-medium text-body-subtle">Active Projects</span>
                <p class="mt-4 text-3xl font-semibold text-heading">6</p>
                <p class="mt-1 text-xs text-body-subtle">2 new this month</p>
            </div>
            <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
                <span class="text-sm font-medium text-body-subtle">Completed Tasks</span>
                <p class="mt-4 text-3xl font-semibold text-heading">128</p>
                <p class="mt-1 text-xs text-body-subtle">+14 from last month</p>
            </div>
            <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
                <span class="text-sm font-medium text-body-subtle">In Review</span>
                <p class="mt-4 text-3xl font-semibold text-heading">8</p>
                <p class="mt-1 text-xs text-body-subtle">3 due this week</p>
            </div>
            <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
                <span class="text-sm font-medium text-body-subtle">Overdue</span>
                <p class="mt-4 text-3xl font-semibold text-heading">1</p>
                <p class="mt-1 text-xs text-body-subtle">needs attention</p>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div class="space-y-4 lg:col-span-2">
                <div class="flex items-center justify-between">
                    <h2 class="text-base font-semibold text-heading">Active projects</h2>
                    <a href="#" class="text-sm font-medium text-body transition-colors hover:text-heading">View
                        all</a>
                </div>

                <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h3 class="text-sm font-semibold text-heading">Website Redesign</h3>
                            <p class="text-xs text-body-subtle">Acme Corp · Due Sep 30, 2026</p>
                        </div>
                        <x-flowbite.badge variant="info" message="In progress" />
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center justify-between text-xs text-body-subtle">
                            <span>14 of 21 tasks done</span>
                            <span class="font-medium text-heading">68%</span>
                        </div>
                        <div class="mt-1.5 h-1.5 w-full overflow-hidden rounded-full bg-neutral-tertiary-medium">
                            <div class="h-full rounded-full bg-brand" style="width: 68%;"></div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-xs font-medium text-body-subtle">High priority</span>
                        <x-flowbite.buttons variant="outline" size="sm" href="#">View
                            project</x-flowbite.buttons>
                    </div>
                </div>

                <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h3 class="text-sm font-semibold text-heading">Mobile App Launch</h3>
                            <p class="text-xs text-body-subtle">Nimbus Ltd · Due Dec 15, 2026</p>
                        </div>
                        <x-flowbite.badge variant="warning" message="In review" />
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center justify-between text-xs text-body-subtle">
                            <span>18 of 20 tasks done</span>
                            <span class="font-medium text-heading">90%</span>
                        </div>
                        <div class="mt-1.5 h-1.5 w-full overflow-hidden rounded-full bg-neutral-tertiary-medium">
                            <div class="h-full rounded-full bg-warning" style="width: 90%;"></div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-xs font-medium text-body-subtle">High priority</span>
                        <x-flowbite.buttons variant="outline" size="sm" href="#">View
                            project</x-flowbite.buttons>
                    </div>
                </div>

                <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h3 class="text-sm font-semibold text-heading">E-commerce Migration</h3>
                            <p class="text-xs text-body-subtle">Bluepeak Co. · Due Nov 05, 2026</p>
                        </div>
                        <x-flowbite.badge variant="gray" message="On hold" />
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center justify-between text-xs text-body-subtle">
                            <span>9 of 24 tasks done</span>
                            <span class="font-medium text-heading">38%</span>
                        </div>
                        <div class="mt-1.5 h-1.5 w-full overflow-hidden rounded-full bg-neutral-tertiary-medium">
                            <div class="h-full rounded-full bg-neutral-quaternary" style="width: 38%;"></div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-xs font-medium text-body-subtle">Medium priority</span>
                        <x-flowbite.buttons variant="outline" size="sm" href="#">View
                            project</x-flowbite.buttons>
                    </div>
                </div>

                <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h3 class="text-sm font-semibold text-heading">Brand Refresh</h3>
                            <p class="text-xs text-body-subtle">Sunray Studio · Due Jan 20, 2027</p>
                        </div>
                        <x-flowbite.badge variant="dark" message="Planned" />
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center justify-between text-xs text-body-subtle">
                            <span>2 of 12 tasks done</span>
                            <span class="font-medium text-heading">17%</span>
                        </div>
                        <div class="mt-1.5 h-1.5 w-full overflow-hidden rounded-full bg-neutral-tertiary-medium">
                            <div class="h-full rounded-full bg-neutral-quaternary" style="width: 17%;"></div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-xs font-medium text-body-subtle">Low priority</span>
                        <x-flowbite.buttons variant="outline" size="sm" href="#">View
                            project</x-flowbite.buttons>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
                    <h2 class="mb-4 text-base font-semibold text-heading">Upcoming milestones</h2>
                    <ul class="space-y-4">
                        <li>
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <p class="text-sm font-medium text-heading">Design review sign-off</p>
                                    <p class="text-xs text-body-subtle">Website Redesign · Sep 17, 2026</p>
                                </div>
                                <x-flowbite.badge variant="warning" message="3 days" />
                            </div>
                        </li>
                        <li>
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <p class="text-sm font-medium text-heading">Beta build submission</p>
                                    <p class="text-xs text-body-subtle">Mobile App Launch · Sep 24, 2026</p>
                                </div>
                                <x-flowbite.badge variant="info" message="10 days" />
                            </div>
                        </li>
                        <li>
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <p class="text-sm font-medium text-heading">Content freeze</p>
                                    <p class="text-xs text-body-subtle">E-commerce Migration · Nov 01, 2026</p>
                                </div>
                                <x-flowbite.badge variant="dark" message="49 days" />
                            </div>
                        </li>
                    </ul>
                    <div class="mt-5 border-t border-default pt-4">
                        <x-flowbite.buttons variant="secondary" size="sm" full href="#">Open
                            calendar</x-flowbite.buttons>
                    </div>
                </div>

                <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
                    <h2 class="mb-4 text-base font-semibold text-heading">Recent activity</h2>
                    <ul class="space-y-4">
                        <li>
                            <p class="text-sm text-body"><span class="font-medium text-heading">Leo</span> completed
                                “Design API schema”.</p>
                            <p class="mt-0.5 text-xs text-body-subtle">2 hours ago</p>
                        </li>
                        <li>
                            <p class="text-sm text-body"><span class="font-medium text-heading">Maya</span> commented on
                                “Set up authentication”.</p>
                            <p class="mt-0.5 text-xs text-body-subtle">5 hours ago</p>
                        </li>
                        <li>
                            <p class="text-sm text-body"><span class="font-medium text-heading">Sprint 24</span>
                                progress updated to 75%.</p>
                            <p class="mt-0.5 text-xs text-body-subtle">1 day ago</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
