<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Actions\Api\CreateSkill;
use App\Http\Requests\Api\SkillRequest;
use App\Http\Resources\Api\SkillResource;

final class SkillController
{
    public function store(SkillRequest $request, CreateSkill $action): SkillResource
    {
        $skill = $action->handle($request->validated());

        return new SkillResource($skill);
    }
}
