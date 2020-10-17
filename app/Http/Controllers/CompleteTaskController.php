<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class CompleteTaskController extends Controller
{
    public function store(Task $task) {
        $task->complete();
    }

    public function destroy(Task $task) {
        $task->incomplete();
    }
}
