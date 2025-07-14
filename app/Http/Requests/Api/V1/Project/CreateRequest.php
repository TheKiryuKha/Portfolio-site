<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Project;

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
            'title' => ['required', 'string', 'min:1', 'max:10'],
            'description' => ['required', 'string', 'min:50', 'max:100'],
            'link' => ['required', 'string', 'min:1', 'max:255'],
        ];
    }
}
