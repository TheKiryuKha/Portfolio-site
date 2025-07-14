<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\Api\V1\CreateProject;
use App\Http\Requests\Api\V1\Project\CreateRequest;
use App\Http\Resources\Api\V1\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class ProjectController
{
    public function index(): AnonymousResourceCollection
    {
        return ProjectResource::collection(
            resource: Project::all()
        );
    }

    public function store(CreateRequest $request, CreateProject $action): ProjectResource
    {
        $project = $action->handle($request->validated());

        return new ProjectResource($project);
    }
}
