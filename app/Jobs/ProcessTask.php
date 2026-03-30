<?php

namespace App\Jobs;

use App\Models\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class ProcessTask implements ShouldQueue
{
    use Queueable;

    /**
     * Number of times the job may be attempted.
     */
    public int $tries = 3;

    /**
     * Create a new job instance.
     */
    public function __construct(public readonly Task $task) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info("Processing task [{$this->task->id}]: {$this->task->title}");

        // Add any heavy / async work here:
        // e.g. send notifications, generate reports, sync external APIs, etc.
    }
}
