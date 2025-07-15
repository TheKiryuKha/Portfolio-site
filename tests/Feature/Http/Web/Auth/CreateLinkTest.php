<?php

declare(strict_types=1);

use App\Mail\LinkSent;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

test('user can get link via email', function () {
    $user = User::factory()->create();
    Mail::fake();

    $this->actingAs($user)
        ->post(route('web:auth:login'), [
            'email' => $user->email,
        ])
        ->assertRedirectToRoute('web:auth:email-sent');

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
