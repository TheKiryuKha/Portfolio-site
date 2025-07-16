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
        /** @var string $app_url */
        $app_url = config('app.url');

        Mail::to(
            users: $payload->email
        )->send(new LinkSent(
            link: $app_url.'/auth?table='.$token
        ));
    }
}
