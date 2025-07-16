<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\Payloads\LoginPayload;
use Illuminate\Foundation\Http\FormRequest;

final class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
        ];
    }

    public function payload(): LoginPayload
    {
        return LoginPayload::make(
            email: $this->string('email')->toString()
        );
    }
}
