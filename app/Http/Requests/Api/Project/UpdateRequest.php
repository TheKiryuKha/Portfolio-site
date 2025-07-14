<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Project;

use Illuminate\Foundation\Http\FormRequest;

final class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'string', 'min:1', 'max:10'],
            'description' => ['sometimes', 'string', 'min:50', 'max:100'],
            'link' => ['sometimes', 'string', 'min:1', 'max:255'],
        ];
    }
}
