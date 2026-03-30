<?php

namespace App\Services;

use App\DTOs\TaskData;
use App\Jobs\ProcessTask;
use App\Models\Task;
use App\Models\User;

class TaskService
{
    /**
     * Create a new task for a specific user and dispatch it for async processing.
     */
    public function createTask(User $user, TaskData $data): Task
    {
        $task = $user->tasks()->create($data->toArray());

        ProcessTask::dispatch($task);

        return $task;
    }

    /**
     * Update task status.
     */
    public function toggleStatus(Task $task): bool
    {
        return $task->update([
            'is_completed' => !$task->is_completed,
        ]);
    }

    /**
     * Delete a task.
     */
    public function deleteTask(Task $task): bool
    {
        return $task->delete();
    }
}
