<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SubTaskService;
use Illuminate\Http\Request;

class SubTaskController extends Controller
{
    public function __construct(protected SubTaskService $service) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'status_id' => 'required|exists:statuses,id',
            'priority_id' => 'required|exists:priorities,id',
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'due_date' => 'required|date',
        ]);

        $validated['user_id'] = auth()->id() ?? User::query()->value('id');

        $this->service->store($validated);

        return back()->with('success', 'Sub task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}