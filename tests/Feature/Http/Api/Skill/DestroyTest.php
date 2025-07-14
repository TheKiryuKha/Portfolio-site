<?php

declare(strict_types=1);

use App\Models\Skill;
use App\Models\User;

test('can delete skill', function () {
    $skill = Skill::factory()->create();
    $user = User::factory()->create();

    $this->actingAs($user)
        ->delete(route('api:skills:destroy', $skill))
        ->assertStatus(204);

    expect(Skill::count())->toBe(0);
});
