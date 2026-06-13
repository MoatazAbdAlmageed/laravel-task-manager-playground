<?php

use App\Filament\Resources\Tasks\Pages\ListTasks;
use App\Models\Task;
use App\Models\User;
use Livewire\Livewire;

test('filament can list tasks', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user->id]);

    $this->actingAs($user);

    Livewire::test(ListTasks::class)
        ->assertCanSeeTableRecords([$task]);
});

test('filament cannot see other users tasks', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user2->id]);

    $this->actingAs($user1);

    Livewire::test(ListTasks::class)
        ->assertCanNotSeeTableRecords([$task]);
});

test('filament can edit a task', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user->id, 'title' => 'Old Title']);

    $this->actingAs($user);

    Livewire::test(ListTasks::class)
        ->callTableAction('edit', $task, data: [
            'title' => 'New Title',
        ]);

    expect($task->refresh()->title)->toBe('New Title');
});

test('filament can mark multiple tasks as done', function () {
    $user = User::factory()->create();
    $tasks = Task::factory()->count(3)->create(['user_id' => $user->id, 'is_completed' => false]);

    $this->actingAs($user);

    Livewire::test(ListTasks::class)
        ->callTableBulkAction('mark_as_done', $tasks);

    foreach ($tasks->fresh() as $task) {
        expect($task->is_completed)->toBeTrue();
    }
});

test('filament can mark multiple tasks as not done', function () {
    $user = User::factory()->create();
    $tasks = Task::factory()->count(3)->create(['user_id' => $user->id, 'is_completed' => true]);

    $this->actingAs($user);

    Livewire::test(ListTasks::class)
        ->callTableBulkAction('mark_as_not_done', $tasks);

    foreach ($tasks->fresh() as $task) {
        expect($task->is_completed)->toBeFalse();
    }
});
