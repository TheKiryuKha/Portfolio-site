<?php

declare(strict_types=1);

namespace App\Payloads;

final readonly class LoginPayload
{
    public function __construct(
        private string $email,
        private string $host
    ) {}

    /**
     * @param  array<string, string>  $attr
     */
    public static function make(array $attr): self
    {
        return new self(
            email: $attr['email'],
            host: $attr['host']
        );
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getHost(): string
    {
        return $this->host;
    }
}
