<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ProjectCollection
     */
    public function index(Request $request)
    {
        $projects = Project::all();

        return new ProjectCollection($projects);
    }

    /**
     * @param \App\Http\Requests\ProjectStoreRequest $request
     * @return \App\Http\Resources\ProjectResource
     */
    public function store(ProjectStoreRequest $request)
    {
        $project = Project::create($request->validated());

        return new ProjectResource($project);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Project $project
     * @return \App\Http\Resources\ProjectResource
     */
    public function show(Request $request, Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * @param \App\Http\Requests\ProjectUpdateRequest $request
     * @param \App\Models\Project $project
     * @return \App\Http\Resources\ProjectResource
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $project->update($request->validated());

        return new ProjectResource($project);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Project $project)
    {
        $project->delete();

        return response()->noContent();
    }
}
