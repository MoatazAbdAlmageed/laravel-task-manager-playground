<?php

test('api can register a user', function () {
    $response = $this->postJson('/api/register', [
        'name' => 'Test User',
        'email' => 'register@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'device_name' => 'test_device',
    ]);

    $response->assertStatus(201)
        ->assertJsonStructure(['token', 'user']);

    $this->assertDatabaseHas('users', [
        'email' => 'register@example.com',
        'name' => 'Test User',
    ]);
});

test('api validates registration data', function () {
    $response = $this->postJson('/api/register', [
        'email' => 'not-an-email',
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['name', 'email', 'password', 'device_name']);
});
