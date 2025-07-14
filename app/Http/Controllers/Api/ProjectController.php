<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Actions\Api\CreateProject;
use App\Actions\Api\EditProject;
use App\Http\Requests\Api\Project\CreateRequest;
use App\Http\Requests\Api\Project\UpdateRequest;
use App\Http\Resources\Api\ProjectResource;
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

    public function update(UpdateRequest $request, Project $project, EditProject $action): ProjectResource
    {
        $action->handle(
            project: $project,
            attributes: $request->validated()
        );

        return new ProjectResource($project);
    }
}
