<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

final class LoginController
{
    public function create(): View
    {
        return view('auth.email-sent');
    }

    public function store(string $token): RedirectResponse
    {
        $email = DB::table('password_reset_tokens')
            ->where('token', $token)
            ->value('email');

        $user = User::where('email', $email)->firstOrFail();

        Auth::login($user);

        request()->session()->regenerate();

        $token = $user->createToken(
            'admin',
            ['*']
        );

        session(['token' => $token->plainTextToken]);

        return redirect()->intended();
    }
}
