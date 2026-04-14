<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;

    public function __construct(
        protected TaskService $taskService
    ) {}

    public function index()
    {
        return view('tasks.index');
    }
}
