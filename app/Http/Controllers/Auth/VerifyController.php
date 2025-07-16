<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\LoginService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final readonly class VerifyController
{
    public function __construct(
        private LoginService $service
    ) {}

    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $this->service->createVerifyLink(
            payload: $request->payload()
        );

        return to_route('web:auth:create');
    }
}
