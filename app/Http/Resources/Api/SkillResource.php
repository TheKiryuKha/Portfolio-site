<?php

declare(strict_types=1);

namespace App\Http\Resources\Api;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Skill $resource
 */
final class SkillResource extends JsonResource
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
            'type' => 'skill',
            'attributes' => [
                'description' => $this->resource->description,
                'source' => $this->resource->source,
                'created' => new DateResource(
                    $this->resource->created_at
                ),
            ],
        ];
    }
}
