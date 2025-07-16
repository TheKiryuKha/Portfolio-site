<?php

declare(strict_types=1);

namespace App\Services;

use App\Actions\CreateToken;
use App\Actions\CreateVerifyToken;
use App\Actions\DeleteVerifyToken;
use App\Actions\SendVerifyLink;
use App\Models\User;
use App\Payloads\LoginPayload;
use App\Queries\GetLoginDataViaToken;
use Illuminate\Support\Facades\Auth;

final readonly class LoginService
{
    public function __construct(
        private DeleteVerifyToken $deleteVerifyToken,
        private CreateVerifyToken $createVerifyToken,
        private SendVerifyLink $sendVerifyLink,
        private CreateToken $createToken,
        private GetLoginDataViaToken $getLoginDataViaToken
    ) {}

    public function createVerifyLink(LoginPayload $payload): void
    {
        $this->deleteVerifyToken->handle($payload);
        $token = $this->createVerifyToken->handle($payload);

        $this->sendVerifyLink->handle($payload, $token);
    }

    public function login(string $token): void
    {
        $payload = $this->getLoginDataViaToken->handle($token);

        $this->deleteVerifyToken->handle($payload);

        $user = User::getUserByEmail(
            email: $payload->email
        );

        Auth::login($user);

        $token = $this->createToken->handle($user);

        session(['token' => $token->plainTextToken]);
    }
}
