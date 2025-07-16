<?php

declare(strict_types=1);

test("user can see 'email-sent' view", function () {
    $this->get(
        route('web:auth:create')
    )->assertStatus(200);
});
