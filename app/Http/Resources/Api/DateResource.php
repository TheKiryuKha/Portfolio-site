<?php

declare(strict_types=1);

namespace App\Http\Resources\Api;

use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read CarbonInterface $resource
 */
final class DateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'himan' => $this->resource->diffForHumans(),
            'string' => $this->resource->toDateTimeString(),
            'local' => $this->resource->toDateTimeLocalString(),
            'timestamp' => $this->resource->timestamp,
        ];
    }
}
