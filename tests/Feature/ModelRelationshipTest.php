<?php

use App\Models\User;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('task belongs to a user', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user->id]);

    expect($task->user)->toBeInstanceOf(User::class);
    expect($task->user->id)->toBe($user->id);
});

test('user has many tasks', function () {
    $user = User::factory()->create();
    Task::factory()->count(3)->create(['user_id' => $user->id]);

    expect($user->tasks)->toHaveCount(3);
    expect($user->tasks->first())->toBeInstanceOf(Task::class);
});
