<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\User;
use Laravel\Sanctum\NewAccessToken;

final readonly class CreateToken
{
    /**
     * Execute's the action
     */
    public function handle(User $user): NewAccessToken
    {
        return $token = $user->createToken(
            'admin',
            ['*']
        );
    }
}
