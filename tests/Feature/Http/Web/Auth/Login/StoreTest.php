<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\DB;

test('user can login after verifieng email', function () {
    $user = User::factory()->create();
    $token = hash('md5', $user->email);
    DB::table('password_reset_tokens')->insert([
        'email' => $user->email,
        'token' => $token,
    ]);

    $this->actingAs($user)
        ->get(route('web:auth:store', $token))
        ->assertRedirect();

    $this->assertAuthenticatedAs($user);

    $this->assertNotNull(session('token'));

});
