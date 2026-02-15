<?php

use App\Models\User;

test('user can get initials', function () {
    $user = new User(['name' => 'John Doe']);
    expect($user->initials)->toBe('JD');

    $user = new User(['name' => 'Jane']);
    expect($user->initials)->toBe('J');

    $user = new User(['name' => 'Michael Jordan']);
    expect($user->initials)->toBe('MJ');
});
