<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TaskCollection
     */
    public function index(Request $request)
    {
        $tasks = Task::all();

        return new TaskCollection($tasks);
    }

    /**
     * @param \App\Http\Requests\TaskStoreRequest $request
     * @return \App\Http\Resources\TaskResource
     */
    public function store(TaskStoreRequest $request)
    {
        $task = Task::create($request->validated());

        return new TaskResource($task);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Task $task
     * @return \App\Http\Resources\TaskResource
     */
    public function show(Request $request, Task $task)
    {
        return new TaskResource($task);
    }

    /**
     * @param \App\Http\Requests\TaskUpdateRequest $request
     * @param \App\Models\Task $task
     * @return \App\Http\Resources\TaskResource
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->validated());

        return new TaskResource($task);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Task $task)
    {
        $task->delete();

        return response()->noContent();
    }
}
