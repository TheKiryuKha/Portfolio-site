<?php

declare(strict_types=1);

namespace App\Actions\Api;

use App\Models\Skill;

final readonly class EditSkill
{
    /**
     * Execute's the action
     *
     * @param  array<string, mixed>  $status
     */
    public function handle(Skill $skill, array $attributes): Skill
    {
        $skill->update($attributes);

        return $skill;
    }
}
