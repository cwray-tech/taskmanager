<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $tasks = $request->user()->tasks();
        return Inertia::render('Tasks/Index', [
            'tasks' =>  new TaskCollection($tasks)
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response
     */
    public function create(Request $request)
    {
        return Inertia::render('Tasks/Create');
    }

    /**
     * @param \App\Http\Requests\TaskStoreRequest $request
     * @return TaskResource
     */
    public function store(TaskStoreRequest $request)
    {
        $task = Task::create($request->validated());

        $request->session()->flash('task.id', $task->id);

        return new TaskResource($task);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Task $task
     * @return \Inertia\Response
     */
    public function show(Request $request, Task $task)
    {
        return Inertia::render('Tasks/Show', [
            'task' => new TaskResource($task)
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Task $task
     * @return \Inertia\Response
     */
    public function edit(Request $request, Task $task)
    {
        return Inertia::render('Tasks/Edit', [
            'task' => new TaskResource($task)
        ]);
    }

    /**
     * @param \App\Http\Requests\TaskUpdateRequest $request
     * @param \App\Models\Task $task
     * @return TaskResource
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->validated());

        $request->session()->flash('task.id', $task->id);

        return new TaskResource($task);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Task $task)
    {
        $task->delete();

        return redirect()->route('task.index');
    }
}
