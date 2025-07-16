<?php

declare(strict_types=1);

namespace App\Actions;

use App\Payloads\LoginPayload;
use Illuminate\Support\Facades\DB;

final class DeleteVerifyToken
{
    /**
     * Execute's the action
     */
    public function handle(LoginPayload $payload): void
    {
        DB::table('password_reset_tokens')
            ->where('email', $payload->email)
            ->delete();
    }
}
