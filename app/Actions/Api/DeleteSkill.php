<?php

declare(strict_types=1);

namespace App\Actions\Api;

use App\Models\Skill;

final class DeleteSkill
{
    /**
     * Execute's the action
     */
    public function handle(Skill $skill): void
    {
        $skill->delete();
    }
}
