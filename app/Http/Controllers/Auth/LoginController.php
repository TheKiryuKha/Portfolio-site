<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Services\LoginService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final readonly class LoginController
{
    public function __construct(
        private LoginService $service
    ) {}

    public function create(): View
    {
        return view('auth.email-sent');
    }

    public function store(string $token): RedirectResponse
    {
        $this->service->login($token);

        request()->session()->regenerate();

        return redirect()->intended();
    }
}
