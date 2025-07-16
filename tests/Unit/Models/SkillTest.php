<?php

declare(strict_types=1);

use App\Models\Skill;

test('to array', function () {
    $skill = Skill::factory()->create()->fresh();

    expect(array_keys($skill->toArray()))->toBe([
        'id',
        'description',
        'source',
        'status',
        'created_at',
        'updated_at',
    ]);
});
