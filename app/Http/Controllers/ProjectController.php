<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Services\PriorityService;
use App\Services\ProjectService;
use App\Services\StatusService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected ProjectService $project_service;
    protected StatusService $status_service;
    protected PriorityService $priority_service;

    public function __construct(
        ProjectService $project_service,
        StatusService $status_service,
        PriorityService $priority_service
    ) {
        $this->project_service = $project_service;
        $this->status_service = $status_service;
        $this->priority_service = $priority_service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.project.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = $this->status_service->index();
        $priorities = $this->priority_service->index();

        return view('pages.project.create', compact('statuses', 'priorities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        try {
            $project = $this->project_service->store($request->validated());

            return redirect()->route('projects.show', $project->id);
        } catch (\Throwable $th) {
            //throw $th;

            $this->serverError($th, 'Project', null, 'store');

            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $id)
    {
        $project = $this->project_service->find($id);

        return view('pages.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $project = $this->project_service->find($id);
        $statuses = $this->status_service->index();
        $priorities = $this->priority_service->index();

        return view('pages.project.edit', compact('project', 'statuses', 'priorities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, int $id)
    {
        try {
            $project = $this->project_service->update($id, $request->validated());

            return redirect()->route('projects.show', $project->id);
        } catch (\Throwable $th) {
            //throw $th;

            $this->serverError($th, 'Project', $id, 'update');

            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $this->project_service->delete($id);

            return redirect()->route('projects.index')->with('message', 'Project deleted successfully.');
        } catch (\Throwable $th) {
            //throw $th;

            $this->serverError($th, 'Project', $id, 'delete');

            return redirect()->back()->withInput();
        }
    }
}
