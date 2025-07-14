<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\SkillStatus;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property-read string $description
 * @property-read string $source
 * @property-read SkillStatus $status
 * @property-read CarbonInterface $created_at
 * @property-read CarbonInterface $updated_at
 */
final class Skill extends Model
{
    /** @use HasFactory<\Database\Factories\SkillFactory> */
    use HasFactory;

    protected $casts = [
        'status' => SkillStatus::class,
    ];
}
