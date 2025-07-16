<?php

declare(strict_types=1);

namespace App\Actions;

use App\Mail\LinkSent;
use App\Payloads\LoginPayload;
use Illuminate\Support\Facades\Mail;

final readonly class SendVerifyLink
{
    /**
     * Execute's the action
     */
    public function handle(LoginPayload $payload, string $token): void
    {
        Mail::to(
            users: $payload->getEmail()
        )->send(new LinkSent(
            link: 'https://'.$payload->getHost().'/auth?table='.$token
        ));
    }
}
