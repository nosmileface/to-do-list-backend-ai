<?php

namespace App\Http\Requests\Task;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Укажите название задачи.',
            'title.string' => 'Название задачи должно быть строкой.',
            'title.max' => 'Название задачи не должно превышать 255 символов.',

            'description.required' => 'Укажите описание задачи.',
            'description.string' => 'Описание задачи должно быть строкой.'
        ];
    }
}
