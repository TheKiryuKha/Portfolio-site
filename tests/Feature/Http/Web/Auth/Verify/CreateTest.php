<?php

declare(strict_types=1);

test('user can see verify form', function () {
    $this->get(route('web:auth:verify:create'))
        ->assertStatus(200);
});
