<?php

declare(strict_types=1);

namespace App\Actions;

use App\Payloads\LoginPayload;
use Illuminate\Support\Facades\DB;

final class CreateVerifyToken
{
    /**
     * Execute's the action
     */
    public function handle(LoginPayload $payload): string
    {
        $token = hash('md5', $payload->getEmail());

        DB::table('password_reset_tokens')->insert([
            'email' => $payload->getEmail(),
            'token' => $token,
        ]);

        return $token;
    }
}
