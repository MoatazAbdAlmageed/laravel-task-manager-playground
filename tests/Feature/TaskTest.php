<?php

use App\Models\User;
use App\Models\Task;

test('tasks page is displayed', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/tasks');

    $response->assertOk();
});

test('task can be created', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post('/tasks', [
            'title' => 'New Task',
            'description' => 'Test Description',
        ]);

    $response->assertRedirect('/tasks');
    $this->assertDatabaseHas('tasks', [
        'title' => 'New Task',
        'user_id' => $user->id,
    ]);
});

test('task can be completed', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user->id, 'is_completed' => false]);

    $response = $this
        ->actingAs($user)
        ->patch("/tasks/{$task->id}");

    $response->assertRedirect('/tasks');
    $this->assertTrue($task->refresh()->is_completed);
});

test('task can be deleted', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user->id]);

    $response = $this
        ->actingAs($user)
        ->delete("/tasks/{$task->id}");

    $response->assertRedirect('/tasks');
    $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
});

test('user cannot access other users tasks', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user2->id]);

    $response = $this
        ->actingAs($user1)
        ->delete("/tasks/{$task->id}");

    $response->assertForbidden();
});
