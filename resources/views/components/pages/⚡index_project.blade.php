<?php

use App\Services\PriorityService;
use App\Services\ProjectService;
use App\Services\StatusService;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public ?int $status_id = null;
    public ?int $priority_id = null;
    public ?string $search = null;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedStatusId()
    {
        $this->status_id = $this->status_id ?: null;
        $this->resetPage();
    }

    public function updatedPriorityId()
    {
        $this->priority_id = $this->priority_id ?: null;
        $this->resetPage();
    }

    public function projects()
    {
        $filter = ['status_id' => $this->status_id, 'priority_id' => $this->priority_id];

        return app(ProjectService::class)->retrieve($this->search, $filter);
    }

    public function statuses()
    {
        return app(StatusService::class)->index();
    }

    public function priorities()
    {
        return app(PriorityService::class)->index();
    }

    public function completedStatusId(): ?int
    {
        return $this->statuses()->first(fn($status) => str_contains(strtolower($status->name), 'complete') || str_contains(strtolower($status->name), 'done'))?->id;
    }
};
?>

<div class="space-y-6">
    {{-- Search & filters --}}
    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
        <div>
            <label for="search-projects" class="mb-2 block text-sm font-medium text-heading">Search</label>
            <input id="search-projects" type="text" wire:model.live.debounce.300ms="search"
                placeholder="Search by project, client..."
                class="block w-full rounded-base border border-default bg-neutral-primary p-2.5 text-sm text-heading placeholder:text-body-subtle transition-colors focus:border-ring focus:bg-neutral-primary focus:outline-none focus:ring-2 focus:ring-ring" />
        </div>

        <x-flowbite.select name="status_id" label="Status" wire:model.live="status_id">
            <x-flowbite.select_options :items="$this->statuses()->map(fn($status) => ['value' => $status->id, 'label' => $status->name])->all()" placeholder="All statuses" :selected="$status_id" />
        </x-flowbite.select>

        <x-flowbite.select name="priority_id" label="Priority" wire:model.live="priority_id">
            <x-flowbite.select_options :items="$this->priorities()
                ->map(fn($priority) => ['value' => $priority->id, 'label' => $priority->name])
                ->all()" placeholder="All priorities" :selected="$priority_id" />
        </x-flowbite.select>
    </div>

    {{-- Listing --}}
    @php
        $projects = $this->projects();
        $completedStatusId = $this->completedStatusId();
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse ($projects as $project)
            @php
                $id = $project->id;
                $name = $project->project_name;
                $client = $project->client_name ?: 'No client';
                $due = \Carbon\Carbon::parse($project->due_date)->format('M d, Y');
                $status = ucwords($project->status ?? '—');
                $priority = ucwords($project->priority ?? '—');

                $tasks = $project->tasks;
                $taskCount = $tasks->count();
                $completed = $completedStatusId ? $tasks->where('status_id', $completedStatusId)->count() : 0;
                $percent = $taskCount > 0 ? (int) round(($completed / $taskCount) * 100) : 0;
                $progressText = $taskCount > 0 ? "{$completed} of {$taskCount} tasks done" : 'No task found.';
            @endphp

            <div class="rounded-base border border-default bg-neutral-primary p-5 shadow-xs">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h3 class="text-sm font-semibold text-heading">{{ $name }}</h3>
                        <p class="mt-0.5 text-xs text-body-subtle">{{ $client }} · Due {{ $due }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-flowbite.badge variant="info" :message="$status" />
                        <details class="group relative">
                            <summary
                                class="flex list-none cursor-pointer items-center justify-center rounded-base p-2 text-body transition-colors hover:bg-neutral-secondary-medium hover:text-heading focus:outline-none focus:ring-2 focus:ring-ring [&::-webkit-details-marker]:hidden">
                                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <circle cx="5" cy="12" r="1.5" />
                                    <circle cx="12" cy="12" r="1.5" />
                                    <circle cx="19" cy="12" r="1.5" />
                                </svg>
                            </summary>
                            <div
                                class="absolute right-0 z-10 mt-2 w-44 rounded-base border border-default bg-neutral-primary py-2 text-sm text-body shadow-xs">
                                <a href="{{ route('projects.edit', $id) }}"
                                    class="block whitespace-nowrap px-4 py-2 hover:bg-neutral-secondary-medium hover:text-heading">Edit
                                    project</a>
                                <a href="#"
                                    class="block whitespace-nowrap px-4 py-2 hover:bg-neutral-secondary-medium hover:text-heading">Archive
                                    project</a>
                            </div>
                        </details>
                    </div>
                </div>

                <div class="mt-4 mb-2">
                    <div class="flex items-center justify-between text-xs text-body-subtle">
                        <span>{{ $progressText }}</span>
                        <span class="font-medium text-heading">{{ $percent }}%</span>
                    </div>
                    <div class="mt-1.5 h-1.5 w-full overflow-hidden rounded-full bg-neutral-tertiary-medium">
                        <div class="h-full rounded-full bg-brand" style="width: {{ $percent }}%;"></div>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <span class="text-xs font-medium text-body-subtle">{{ $priority }} priority</span>
                    <x-flowbite.buttons variant="outline" size="sm" :href="route('projects.show', $id)">View project
                    </x-flowbite.buttons>
                </div>
            </div>
        @empty
            <div
                class="rounded-base border border-dashed border-default bg-neutral-primary px-5 py-16 text-center shadow-xs">
                <h3 class="text-base font-semibold text-heading">No projects found</h3>
                <p class="mt-1 text-sm text-body-subtle">Try adjusting your search or filters, or create a new project.
                </p>
            </div>
        @endforelse
    </div>

    @if ($projects->hasPages())
        <div>
            {{ $projects->links() }}
        </div>
    @endif
</div>
