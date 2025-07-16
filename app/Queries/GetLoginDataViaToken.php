<?php

declare(strict_types=1);

namespace App\Queries;

use App\Payloads\LoginPayload;
use Illuminate\Support\Facades\DB;

final class GetLoginDataViaToken
{
    public function handle(string $token): LoginPayload
    {
        /** @var string $email */
        $email = DB::table('password_reset_tokens')
            ->where('token', $token)
            ->value('email');

        return LoginPayload::make($email);
    }
}
