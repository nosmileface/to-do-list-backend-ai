<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8']
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Поле электронной почты обязательно для заполнения.',
            'email.string' => 'Электронная почта должна быть строкой.',
            'email.email' => 'Введите корректный адрес электронной почты.',
            'email.max' => 'Электронная почта не должна превышать 255 символов.',

            'password.required' => 'Поле пароля обязательно для заполнения.',
            'password.string' => 'Пароль должен быть строкой.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.'
        ];
    }
}
