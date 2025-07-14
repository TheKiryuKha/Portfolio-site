<?php

declare(strict_types=1);

it('returns the correct status code if unauthenticated', function () {
    $this->getJson(
        route('api:projects:index')
    )->assertStatus(401);
})->skip();

test('returns the correct status code if authenticated', function () {
    $this->getJson(
        route('api:projects:index')
    )->assertStatus(200);
});
