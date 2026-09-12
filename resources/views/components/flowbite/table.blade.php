@props([
    'columns' => [],
    'rows' => [],
    'striped' => true,
    'hover' => true,
])

@php
    $columns = $columns ?: [
        'Task',
        'Assignee',
        'Status',
        'Priority',
        'Due date',
    ];

    $rows = $rows ?: [
        ['Build landing page', 'Ken Adams', 'In progress', 'High', 'Sep 20, 2026'],
        ['Set up authentication', 'Maya Chen', 'Completed', 'Medium', 'Sep 10, 2026'],
        ['Design API schema', 'Leo Park', 'In progress', 'High', 'Sep 24, 2026'],
        ['Write unit tests', 'Ava Torres', 'Pending', 'Low', 'Oct 02, 2026'],
        ['Optimize database queries', 'Ken Adams', 'Review', 'Medium', 'Sep 28, 2026'],
        ['Prepare demo environment', 'Maya Chen', 'Pending', 'Low', 'Oct 05, 2026'],
    ];
@endphp

<div class="w-full overflow-x-auto rounded-base border border-default shadow-xs">
    <table class="w-full min-w-full text-left text-sm text-body">
        <thead class="bg-neutral-secondary text-xs uppercase tracking-wide text-body-subtle">
            <tr>
                @foreach($columns as $column)
                    <th scope="col" class="px-6 py-3 whitespace-nowrap">{{ $column }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-default">
            @foreach($rows as $index => $row)
                @php
                    $cells = is_array($row) ? array_values($row) : [$row];
                @endphp
                <tr class="{{ ($striped && $index % 2 === 1 ? 'bg-neutral-tertiary-soft ' : '') . ($hover ? 'hover:bg-neutral-secondary-soft' : '') }}">
                    @foreach($columns as $cellIndex => $column)
                        <td class="px-6 py-4 whitespace-nowrap">{{ $cells[$cellIndex] ?? '' }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>