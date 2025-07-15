<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Mail\LinkSent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

final class AuthController
{
    public function createLink(LoginRequest $request)
    {
        $token = bcrypt($request->string('email')->toString());
        $email = $request->string('email')->toString();

        DB::table('password_reset_tokens')
            ->where('email', $email)
            ->delete();

        DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'token' => $token,
        ]);

        $link = 'https://'.$request->url().'/login-verify?token='.$token;

        Mail::to($email)->send(new LinkSent($link));

        dd('читай логи');

        // отправка на почту

        // редирект на вьюшку

    }
}
