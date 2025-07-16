<?php

declare(strict_types=1);

namespace App\Services;

use App\Actions\CreateVerifyToken;
use App\Actions\DeleteVerifyToken;
use App\Actions\SendVerifyLink;
use App\Payloads\LoginPayload;

final class LoginService
{
    public function __construct(
        private readonly DeleteVerifyToken $deleteVerifyLink,
        private readonly CreateVerifyToken $createVerifyToken,
        private readonly SendVerifyLink $sendVerifyLink,
    ) {}

    public function createVerifyLink(LoginPayload $payload): void
    {
        $this->deleteVerifyLink->handle($payload);
        $token = $this->createVerifyToken->handle($payload);

        $this->sendVerifyLink->handle($payload, $token);
    }
}
