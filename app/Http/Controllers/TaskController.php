<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use App\DTOs\TaskData;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;

    public function __construct(
        protected TaskService $taskService
    ) {}

    public function index()
    {
        $tasks = auth()->user()->tasks()->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function store(TaskRequest $request)
    {
        $this->taskService->createTask(
            auth()->user(),
            TaskData::fromRequest($request)
        );

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function update(Task $task)
    {
        $this->authorize('update', $task);

        $this->taskService->toggleStatus($task);

        return redirect()->route('tasks.index')->with('success', 'Task status updated.');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $this->taskService->deleteTask($task);

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
