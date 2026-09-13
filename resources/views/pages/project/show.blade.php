@extends('layouts.app')

@section('page_title')
    {{ ucwords($project->project_name) }}
@endsection

@section('page_desc')
    {{ ucfirst($project->desc) }}
@endsection

@section('page_navigation')
    <div class="flex flex-wrap gap-1">
        <x-flowbite.buttons variant="primary" href="{{ route('tasks.create') }}">
            New Task
        </x-flowbite.buttons>

        <x-flowbite.buttons variant="secondary" href="{{ route('projects.edit', $project->id) }}">
            Edit
        </x-flowbite.buttons>

        <x-flowbite.buttons variant="secondary" data-modal-target="delete-project-modal"
            data-modal-toggle="delete-project-modal">
            Delete
        </x-flowbite.buttons>
    </div>
@endsection

@php
    $tasks = $project->tasks;
@endphp

@section('content')
    {{-- Project Board --}}
    <div class="grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
        @forelse ($tasks as $task)
            @php
                $sub_tasks = $task->sub_tasks()->limit(5)->get();
                $sub_task_count = $task->sub_tasks()->count();
            @endphp

            {{-- Task Column --}}
            <div class="min-w-0 rounded-base bg-neutral-secondary-soft">
                {{-- Task Header --}}
                <div class="px-3 pb-2 pt-3">
                    <div class="flex items-start justify-between gap-2">
                        <div class="min-w-0">
                            <h2 class="truncate text-lg font-semibold text-heading">
                                {{ ucfirst($task->name) }} ({{ $sub_task_count }})
                            </h2>

                            @if ($task->desc)
                                <p class="mt-0.5 line-clamp-1 text-xs text-body-subtle">
                                    {{ ucfirst($task->desc) }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Sub Tasks --}}
                @if ($sub_tasks->isNotEmpty())
                    <div
                        class="mx-2 divide-y divide-default overflow-hidden rounded-base border border-default bg-neutral-primary">
                        @foreach ($sub_tasks as $sub_task)
                            <div class="px-3 py-2">
                                <div class="flex items-start justify-between gap-2">
                                    <div class="min-w-0">
                                        <h3 class="truncate text-md font-medium text-heading">
                                            {{ ucfirst($sub_task->name) }}
                                        </h3>

                                        @if ($sub_task->desc)
                                            <p class="mt-0.5 line-clamp-1 text-xs text-body">
                                                {{ ucfirst($sub_task->desc) }}
                                            </p>
                                        @endif
                                    </div>

                                    <button type="button"
                                        class="shrink-0 rounded-base p-1 text-body-subtle transition-colors hover:bg-neutral-secondary-medium hover:text-heading">
                                        <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                        </svg>
                                    </button>
                                </div>

                                {{-- Sub Task Meta --}}
                                @if ($sub_task->status || $sub_task->priority || $sub_task->due_date)
                                    <div
                                        class="mt-1.5 flex flex-wrap items-center gap-x-2 gap-y-0.5 text-xs text-body-subtle">
                                        @if ($sub_task->due_date)
                                            <span class="inline-flex items-center gap-1">
                                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>

                                                {{ \Carbon\Carbon::parse($sub_task->due_date)->format('M d, Y') }}
                                            </span>
                                        @endif

                                    </div>
                                @endif

                            </div>
                        @endforeach

                    </div>
                @else
                    <div class="p-2 mx-2 overflow-hidden rounded-base border border-default bg-neutral-primary">
                        <p class=" text-xs text-body-subtle">
                            No sub-tasks yet.
                        </p>
                    </div>
                @endif

                {{-- View More --}}
                @if ($sub_task_count > 5)
                    <x-flowbite.buttons variant="secondary" href="{{ route('projects.edit', $project->id) }}">
                        view more
                    </x-flowbite.buttons>
                @endif

                {{-- Add Sub Task --}}
                <div class="px-2 pb-3 pt-2">
                    <x-flowbite.buttons variant="primary" size="md" full
                        data-modal-target="create-sub-task-modal-{{ $task->id }}"
                        data-modal-toggle="create-sub-task-modal-{{ $task->id }}">

                        Add Sub-task
                    </x-flowbite.buttons>
                </div>
            </div>

            {{-- Create Sub Task Modal --}}
            <x-flowbite.modal id="create-sub-task-modal-{{ $task->id }}" title="Create Sub-task" class="hidden">
                <form action="" method="POST">
                    @csrf

                    <input type="hidden" name="task_id" value="{{ $task->id }}">

                    <div class="space-y-4">
                        {{-- Name --}}
                        <x-flowbite.inputs name="name" :id="'sub_task_name_' . $task->id" label="Sub-task Name"
                            placeholder="Enter sub-task name" />

                        {{-- Description --}}
                        <x-flowbite.text-area name="desc" :id="'sub_task_desc_' . $task->id" label="Description" rows="3"
                            placeholder="Describe the sub-task" />

                        {{-- Due Date --}}
                        <x-flowbite.inputs name="due_date" :id="'due_date_' . $task->id" type="date" label="Due Date" />
                    </div>

                    <x-slot name="footer">
                        <x-flowbite.buttons variant="secondary" type="button"
                            data-modal-hide="create-sub-task-modal-{{ $task->id }}">
                            Cancel
                        </x-flowbite.buttons>

                        <x-flowbite.buttons variant="primary" type="submit">
                            Create Sub-task
                        </x-flowbite.buttons>
                    </x-slot>
                </form>
            </x-flowbite.modal>
        @empty
            {{-- No Tasks --}}
            <div
                class="w-full rounded-base border border-dashed border-default bg-neutral-primary p-8 text-center md:col-span-2 xl:col-span-3 2xl:col-span-4">
                <div class="mx-auto max-w-md">
                    <div
                        class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-base bg-neutral-secondary-medium">

                        <svg class="h-5 w-5 text-body-subtle" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5h6" />
                        </svg>
                    </div>

                    <h2 class="text-md font-semibold text-heading">
                        No tasks yet
                    </h2>

                    <p class="mt-0.5 text-md text-body-subtle">
                        Start organizing this project by creating your first task.
                    </p>

                    <div class="mt-4">
                        <x-flowbite.buttons variant="primary" size="md" href="{{ route('tasks.create') }}">
                            Create Task
                        </x-flowbite.buttons>
                    </div>
                </div>
            </div>
        @endforelse

    </div>

    {{-- Delete Project Modal --}}
    <x-flowbite.modal id="delete-project-modal" title="Delete project" class="hidden">
        <p class="text-md text-body-subtle">
            Are you sure you want to delete
            <span class="font-medium text-heading">
                "{{ $project->project_name }}"
            </span>?

            This action cannot be undone.
        </p>

        <x-slot name="footer">
            <x-flowbite.buttons variant="secondary" data-modal-hide="delete-project-modal">
                Cancel
            </x-flowbite.buttons>

            <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <x-flowbite.buttons variant="danger" type="submit">
                    Delete project
                </x-flowbite.buttons>
            </form>
        </x-slot>
    </x-flowbite.modal>
@endsection
