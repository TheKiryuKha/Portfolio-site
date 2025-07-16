<?php

declare(strict_types=1);

test('can see home page', function () {
    $this->get(
        route('web:home')
    )->assertStatus(
        200
    );
});
