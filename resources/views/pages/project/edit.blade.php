@extends('layouts.app')

@section('page_title')
    Edit Project
@endsection

@section('page_desc')
    Set up a new project by providing its details, timeline, and team information.
@endsection

@section('content')
    {{-- Fields: 'status_id', 'priority_id', 'client_name', 'project_name', 'desc', 'start_date', 'due_date' --}}
    {{-- Variables from compact $project, $statuses, $priorities --}}

    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <x-flowbite.inputs name="project_name" label="Project name" placeholder="e.g. Marketing site redesign"
                :value="$project->project_name" class="md:col-span-2" :error="$errors->first('project_name')" required
                hint="Name shown on the projects listing" />
            <x-flowbite.inputs name="client_name" label="Client name" placeholder="e.g. Acme Corp" :value="$project->client_name"
                :error="$errors->first('client_name')" hint="The client this project is being built for" />

            <x-flowbite.select name="status_id" label="Status" placeholder="Select a status" :error="$errors->first('status_id')" required
                hint="Current stage of the project">
                <x-flowbite.select_options name="status_id" :items="$statuses->map(fn($status) => ['value' => $status->id, 'label' => $status->name])->all()" :selected="$project->status_id" />
            </x-flowbite.select>

            <x-flowbite.select name="priority_id" label="Priority" placeholder="Select a priority" :error="$errors->first('priority_id')"
                required hint="How urgent this project is">
                <x-flowbite.select_options name="priority_id" :items="$priorities
                    ->map(fn($priority) => ['value' => $priority->id, 'label' => $priority->name])
                    ->all()" :selected="$project->priority_id" />
            </x-flowbite.select>

            <x-flowbite.inputs name="start_date" label="Start date" type="date" :value="$project->start_date ? \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') : ''" :error="$errors->first('start_date')"
                hint="When work on this project begins" />
            <x-flowbite.inputs name="due_date" label="Due date" type="date" :value="$project->due_date ? \Carbon\Carbon::parse($project->due_date)->format('Y-m-d') : ''" :error="$errors->first('due_date')"
                hint="When the project must be delivered" />

            <x-flowbite.text-area name="desc" label="Description" rows="4" class="md:col-span-2" :value="$project->desc"
                :error="$errors->first('desc')" hint="Goals, scope, and any additional context"
                placeholder="Describe the project's goals and scope" />
        </div>

        <div class="mt-5 flex items-center justify-end gap-2">
            <x-flowbite.buttons variant="secondary" href="{{ route('projects.index') }}">Cancel</x-flowbite.buttons>
            <x-flowbite.buttons variant="primary" type="submit">Update project</x-flowbite.buttons>
        </div>
    </form>
@endsection
