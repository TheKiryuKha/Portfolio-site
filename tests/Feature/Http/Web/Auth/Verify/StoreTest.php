<?php

declare(strict_types=1);

use App\Mail\LinkSent;
use App\Models\User;

test('user can get link via email', function () {
    $user = User::factory()->create();
    Mail::fake();

    $this->actingAs($user)
        ->post(route('web:auth:verify:store'), [
            'email' => $user->email,
        ])
        ->assertRedirectToRoute('web:auth:create');

    $this->assertDatabaseHas('password_reset_tokens', [
        'email' => $user->email,
    ]);

    $this->assertNotNull(
        DB::table('password_reset_tokens')
            ->where('email', $user->email)
            ->first()
    );

    Mail::assertSent(LinkSent::class);
});
