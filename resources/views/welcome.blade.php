@extends('layouts.app')

@section('content')
    <div class="space-y-8">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <x-flowbite.breadcrumb />
                <h1 class="mt-3 text-3xl font-semibold tracking-tight text-heading">Dashboard</h1>
                <p class="mt-1 text-sm text-body-subtle">An overview of your workspace for this week.</p>
            </div>
            <div class="flex items-center gap-2">
                <x-flowbite.dropdowns label="Filter">
                    <ul class="py-1 text-sm text-body">
                        <li><a href="#" class="block px-4 py-2 hover:bg-neutral-secondary-medium hover:text-heading">This week</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-neutral-secondary-medium hover:text-heading">This month</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-neutral-secondary-medium hover:text-heading">All time</a></li>
                    </ul>
                </x-flowbite.dropdowns>
                <x-flowbite.buttons variant="primary">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    New task
                </x-flowbite.buttons>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-body-subtle">Tasks</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-base bg-brand-softer text-brand">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 012-2h8a2 2 0 012 2v1h1a1 1 0 100-2H5a1 1 0 100 2h1v1a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm4 5a1 1 0 100 2h8a1 1 0 100-2H8zm-1 5a1 1 0 011-1h8a1 1 0 110 2H8a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </div>
                <p class="mt-4 text-3xl font-semibold text-heading">28</p>
                <p class="mt-1 text-xs text-body-subtle">4 due this week</p>
            </div>
            <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-body-subtle">Completed</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-base bg-success-soft text-fg-success">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </div>
                <p class="mt-4 text-3xl font-semibold text-heading">21</p>
                <p class="mt-1 text-xs text-body-subtle">+5 from last week</p>
            </div>
            <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-body-subtle">In progress</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-base bg-warning-soft text-fg-warning">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </div>
                <p class="mt-4 text-3xl font-semibold text-heading">11</p>
                <p class="mt-1 text-xs text-body-subtle">across 3 projects</p>
            </div>
            <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-body-subtle">Overdue</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-base bg-danger-soft text-fg-danger">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </div>
                <p class="mt-4 text-3xl font-semibold text-heading">2</p>
                <p class="mt-1 text-xs text-body-subtle">needs attention</p>
            </div>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            <x-flowbite.buttons variant="primary" size="sm">Primary</x-flowbite.buttons>
            <x-flowbite.buttons variant="secondary" size="sm">Secondary</x-flowbite.buttons>
            <x-flowbite.buttons variant="outline" size="sm">Outline</x-flowbite.buttons>
            <x-flowbite.buttons variant="ghost" size="sm">Ghost</x-flowbite.buttons>
            <x-flowbite.buttons variant="danger" size="sm">Danger</x-flowbite.buttons>
            <x-flowbite.buttons variant="success" size="sm">Success</x-flowbite.buttons>
            <x-flowbite.badge variant="info" message="In progress" />
            <x-flowbite.badge variant="success" message="Completed" />
            <x-flowbite.badge variant="warning" message="Review" />
            <x-flowbite.badge variant="danger" message="Overdue" />
            <x-flowbite.badge variant="dark" message="Backlog" />
            <x-flowbite.modal id="demo-modal" title="Create a task" size="lg">
                <p class="text-sm text-body">Build your task form here — title, assignee, status and due date.</p>
            </x-flowbite.modal>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div class="lg:col-span-2">
                <div class="overflow-hidden rounded-base border border-default shadow-xs">
                    <div class="flex items-center justify-between border-b border-default px-5 py-4">
                        <h2 class="text-base font-semibold text-heading">Recent tasks</h2>
                        <a href="#"
                            class="text-sm font-medium text-body transition-colors hover:text-heading">View all →</a>
                    </div>
                    <x-flowbite.table :columns="['Task', 'Assignee', 'Status', 'Priority', 'Due date']"
                        :rows="[
                            ['Build landing page', 'Ken Simms', 'In progress', 'High', 'Sep 20, 2026'],
                            ['Set up authentication', 'Maya Chen', 'Completed', 'Medium', 'Sep 10, 2026'],
                            ['Design API schema', 'Leo Park', 'In progress', 'High', 'Sep 24, 2026'],
                            ['Write unit tests', 'Ava Torres', 'Pending', 'Low', 'Oct 02, 2026'],
                        ]"
                        :striped="false" />
                </div>
            </div>
            <div class="space-y-6">
                <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
                    <h2 class="mb-4 text-base font-semibold text-heading">Quick note</h2>
                    <x-flowbite.inputs name="summary" label="Task title" placeholder="What needs to be done?"
                        hint="Keep it short and specific." />
                    <div class="mt-4">
                        <x-flowbite.select name="status" label="Status" :disabled="false">
                            <x-flowbite.select_options :items="[['value' => 'pending', 'label' => 'Pending'], ['value' => 'in-progress', 'label' => 'In progress'], ['value' => 'completed', 'label' => 'Completed']]" selected="in-progress" />
                        </x-flowbite.select>
                    </div>
                    <x-flowbite.buttons variant="primary" full class="mt-4">Create task</x-flowbite.buttons>
                </div>
                <x-flowbite.accordion>
                    <x-flowbite.accordion-item title="How does Taskly work?" expanded="true">
                        Organize tasks into projects, assign owners, set priorities and due dates, then track progress.
                    </x-flowbite.accordion-item>
                    <x-flowbite.accordion-item title="Can I work with my team?">
                        Yes — invite teammates to a workspace and split work across members.
                    </x-flowbite.accordion-item>
                </x-flowbite.accordion>
            </div>
        </div>

        <x-flowbite.alerts variant="success"
            message="Great job — 21 tasks were completed this week." />

        <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
            <h2 class="mb-1 text-base font-semibold text-heading">Task breakdown</h2>
            <p class="mb-4 text-sm text-body-subtle">Review progress per project.</p>
            <x-flowbite.tabs :tabs="[
                ['id' => 'overview', 'label' => 'Overview', 'content' => '<p class=&quot;text-sm text-body&quot;>Track progress, status and priority across all projects in one place.</p>'],
                ['id' => 'details', 'label' => 'Details', 'content' => '<p class=&quot;text-sm text-body&quot;>Granular breakdown per task with comments and activity.</p>'],
                ['id' => 'activity', 'label' => 'Activity', 'content' => '<p class=&quot;text-sm text-body&quot;>Recent changes and updates from your team.</p>'],
            ]" variant="underline" active="overview" />
        </div>
    </div>
@endsection
