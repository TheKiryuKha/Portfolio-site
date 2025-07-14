<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\SkillStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
final class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->word(),
            'source' => fake()->word(),
            'status' => fake()->randomElement(SkillStatus::cases()),
        ];
    }
}
