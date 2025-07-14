<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Project $resource
 */
final class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'type' => 'project',
            'attributes' => [
                'title' => $this->resource->title,
                'description' => $this->resource->description,
                'link' => $this->resource->link,
                'created' => new DateResource(
                    $this->resource->created_at
                ),
            ],
            // TODO
            'links' => [
                'self' => 'TODO',
                'parent' => route('api:v1:projects:index'),
            ],

        ];
    }
}
