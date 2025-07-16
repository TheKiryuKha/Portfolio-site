<?php

declare(strict_types=1);

use App\Mail\LinkSent;

test('mail consist of right content', function () {
    $mail = new LinkSent('link');

    expect($mail->content()->view)->toBe('emails.link-sent');
});
