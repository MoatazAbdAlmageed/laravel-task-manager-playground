<?php

use App\Models\User;
use App\Models\Task;
use Laravel\Sanctum\Sanctum;

test('api can list tasks', function () {
    $user = User::factory()->create();
    Task::factory()->count(3)->create(['user_id' => $user->id]);

    Sanctum::actingAs($user);

    $response = $this->getJson('/api/tasks');

    $response->assertOk()
        ->assertJsonCount(3);
});

test('api can create task', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $response = $this->postJson('/api/tasks', [
        'title' => 'API Task',
        'description' => 'API Description',
    ]);

    $response->assertStatus(201)
        ->assertJsonPath('title', 'API Task');

    $this->assertDatabaseHas('tasks', ['title' => 'API Task']);
});

test('api can show task', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user->id]);
    Sanctum::actingAs($user);

    $response = $this->getJson("/api/tasks/{$task->id}");

    $response->assertOk()
        ->assertJsonPath('id', $task->id);
});

test('api can update task', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user->id, 'is_completed' => false]);
    Sanctum::actingAs($user);

    $response = $this->patchJson("/api/tasks/{$task->id}", [
        'is_completed' => true,
    ]);

    $response->assertOk();
    $this->assertTrue($task->refresh()->is_completed);
});

test('api can delete task', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user->id]);
    Sanctum::actingAs($user);

    $response = $this->deleteJson("/api/tasks/{$task->id}");

    $response->assertStatus(204);
    $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
});

test('api prevents unauthorized access', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user2->id]);

    Sanctum::actingAs($user1);

    $response = $this->getJson("/api/tasks/{$task->id}");

    $response->assertForbidden();
});
