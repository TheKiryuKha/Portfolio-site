<?php

declare(strict_types=1);

namespace App\Actions\Api;

use App\Enums\SkillStatus;
use App\Models\Skill;

final class CreateSkill
{
    /**
     * Execute's the action
     *
     * @param  array<string, mixed>  $attributes
     */
    public function handle(array $attributes): Skill
    {
        return Skill::create([
            ...$attributes,
            'status' => SkillStatus::Draft,
        ]);
    }
}
