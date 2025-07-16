<?php

declare(strict_types=1);

namespace App\Payloads;

final readonly class LoginPayload
{
    public function __construct(
        public string $email,
    ) {}

    public static function make(string $email): self
    {
        return new self($email);
    }
}
