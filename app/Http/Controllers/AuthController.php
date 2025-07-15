<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Mail\LinkSent;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

final class AuthController
{
    public function createLink(LoginRequest $request): RedirectResponse
    {
        $email = $request->string('email')->toString();
        $token = hash('md5', $email);

        DB::table('password_reset_tokens')
            ->where('email', $email)
            ->delete();

        DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'token' => $token,
        ]);

        $link = 'https://'.$request->getHost().'/auth/login-verify?table='.$token;

        Mail::to($email)->send(new LinkSent($link));

        return to_route('web:auth:email-sent');
    }

    public function verified(string $token): RedirectResponse
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
