<?php

use App\Models\User;
use App\Models\Task;
use Livewire\Volt\Volt;

test('tasks page is displayed', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/tasks')
        ->assertOk()
        ->assertSeeLivewire('task-dashboard');
});

test('task can be created', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    Volt::test('task-dashboard')
        ->set('title', 'New Task')
        ->set('description', 'Test Description')
        ->call('addTask')
        ->assertSet('title', '')
        ->assertSet('description', '');

    $this->assertDatabaseHas('tasks', [
        'title' => 'New Task',
        'user_id' => $user->id,
    ]);
});

test('task can be completed', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user->id, 'is_completed' => false]);

    $this->actingAs($user);

    Volt::test('task-dashboard')
        ->call('toggleTask', $task->id);

    $this->assertTrue($task->refresh()->is_completed);
});

test('task can be deleted', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user->id]);

    $this->actingAs($user);

    Volt::test('task-dashboard')
        ->call('deleteTask', $task->id);

    $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
});

test('user cannot access other users tasks', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user2->id]);

    $this->actingAs($user1);

    Volt::test('task-dashboard')
        ->call('deleteTask', $task->id)
        ->assertForbidden();
});
