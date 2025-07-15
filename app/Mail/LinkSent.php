<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

final class LinkSent extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        protected string $link
    ) {}

    public function build(): self
    {
        return $this->view('emails.link-sent')
            ->with([
                'link' => $this->link,
            ]);
    }
}
