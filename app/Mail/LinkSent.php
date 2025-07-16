<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

final class LinkSent extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        private readonly string $link
    ) {}

    public function content(): Content
    {
        return new Content(
            view: 'emails.link-sent',
            with: [
                'link' => $this->link,
            ]
        );
    }
}
