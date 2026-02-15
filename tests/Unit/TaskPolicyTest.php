<?php

use App\Models\User;
use App\Models\Task;
use App\Policies\TaskPolicy;

test('user can view own task', function () {
    $user = new User();
    $user->id = 1;

    $task = new Task();
    $task->user_id = 1;

    $policy = new TaskPolicy();

    expect($policy->view($user, $task))->toBeTrue();
});

test('user cannot view others task', function () {
    $user = new User();
    $user->id = 1;

    $task = new Task();
    $task->user_id = 2;

    $policy = new TaskPolicy();

    expect($policy->view($user, $task))->toBeFalse();
});

test('user can update own task', function () {
    $user = new User();
    $user->id = 1;

    $task = new Task();
    $task->user_id = 1;

    $policy = new TaskPolicy();

    expect($policy->update($user, $task))->toBeTrue();
});

test('user can delete own task', function () {
    $user = new User();
    $user->id = 1;

    $task = new Task();
    $task->user_id = 1;

    $policy = new TaskPolicy();

    expect($policy->delete($user, $task))->toBeTrue();
});
