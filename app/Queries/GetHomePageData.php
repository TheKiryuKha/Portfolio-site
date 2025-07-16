<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;

final readonly class GetHomePageData
{
    /**
     * @return array{
     *  projects: Collection<int, Project>,
     *  skills: Collection<int, Skill>
     * }
     */
    public function handle(): array
    {
        return [
            'projects' => Project::all(),
            'skills' => Skill::all(),
        ];
    }
}
