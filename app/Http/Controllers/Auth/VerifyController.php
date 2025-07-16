<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Mail\LinkSent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

final class VerifyController
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
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

        $link = 'https://'.$request->getHost().'/auth?table='.$token;

        Mail::to($email)->send(new LinkSent($link));

        return to_route('web:auth:create');
    }
}
