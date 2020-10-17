<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class CompleteTaskController extends Controller
{
    public function store(Task $task) {
        $task->update([
            'completed_at' => now()
        ]);
        return response('Success', 200);
    }

    public function destroy(Task $task) {
        $task->update([
            'completed_at' => null
        ]);
    }
}
