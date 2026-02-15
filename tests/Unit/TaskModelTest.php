<?php

use App\Models\Task;

test('task can determine completion status', function () {
    $task = new Task(['is_completed' => true]);
    expect($task->isCompleted())->toBeTrue();

    $task = new Task(['is_completed' => false]);
    expect($task->isCompleted())->toBeFalse();
});

test('task has a description excerpt', function () {
    $task = new Task(['description' => 'This is a long description that should be capped.']);
    expect($task->excerpt)->toBe('This is a long descr...');

    $task = new Task(['description' => 'Short']);
    expect($task->excerpt)->toBe('Short');
});

test('task has fillable attributes', function () {
    $task = new Task([
        'title' => 'Sample',
        'description' => 'Sample Desc',
        'is_completed' => true,
        'user_id' => 1,
    ]);

    expect($task->title)->toBe('Sample');
    expect($task->description)->toBe('Sample Desc');
    expect($task->isCompleted())->toBeTrue();
    expect($task->user_id)->toBe(1);
});
