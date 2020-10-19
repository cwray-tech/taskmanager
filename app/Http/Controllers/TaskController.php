<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * @param Request $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $tasks = $request->user()
            ->currentTeam
            ->tasks
            ->toArray();

        return Inertia::render('Tasks/Index', [
            'tasks' =>  $tasks
        ]);
    }

    /**
     * @param Request $request
     * @return \Inertia\Response
     */
    public function create(Request $request)
    {
        return Inertia::render('Tasks/Create', [
            'users' => $request->user()
                ->currentTeam
                ->allUsers()
                ->toArray()
        ]);
    }

    /**
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            'details' => ['nullable'],
            'user_id' => ['nullable', 'exists:users,id']
        ]);

        Auth::user()->currentTeam
            ->tasks()->create($validated);

        return Redirect::route('tasks.index');
    }

    /**
     * @param Request $request
     * @param \App\Models\Task $task
     * @return \Inertia\Response
     */
    public function show(Request $request, Task $task)
    {
        return Inertia::render('Tasks/Show', [
            'task' => $task->toArray()
        ]);
    }

    /**
     * @param Request $request
     * @param Task $task
     * @return \Inertia\Response
     */
    public function edit(Request $request, Task $task)
    {
        return Inertia::render('Tasks/Edit', [
            'task' => $task->toArray(),
            'users' => $request->user()->currentTeam->allUsers()->toArray()
        ]);
    }

    /**
     * @param Request $request
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            'details' => ['nullable'],
            'user_id' => ['nullable', 'exists:users,id']
        ]);
        $task->update($validated);

        return Redirect::route('tasks.index');
    }

    /**
     * @param Request $request
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Task $task)
    {
        $task->delete();

        return Redirect::route('tasks.index');
    }
}
