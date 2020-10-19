<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PendingTasksController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function __invoke(Request $request)
    {
        $tasks = $request->user()
            ->currentTeam->tasks
            ->whereNull('completed_at')->toArray();

        return Inertia::render('Tasks/Index', [
            'tasks' => $tasks
        ]);
    }
}
