<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Skill;

use Illuminate\Foundation\Http\FormRequest;

final class CreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => ['required', 'string', 'min:1', 'max:10'],
            'source' => ['required', 'string', 'min:1', 'max:255'],
        ];
    }
}
