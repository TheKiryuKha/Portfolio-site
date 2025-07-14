<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Actions\Api\CreateSkill;
use App\Actions\Api\EditSkill;
use App\Http\Requests\Api\Skill\CreateRequest;
use App\Http\Requests\Api\Skill\UpdateRequest;
use App\Http\Resources\Api\SkillResource;
use App\Models\Skill;

final class SkillController
{
    public function store(CreateRequest $request, CreateSkill $action): SkillResource
    {
        $skill = $action->handle($request->validated());

        return new SkillResource($skill);
    }

    public function update(Skill $skill, UpdateRequest $request, EditSkill $action): SkillResource
    {
        $action->handle(
            $skill,
            $request->validated()
        );

        return new SkillResource($skill);
    }
}
