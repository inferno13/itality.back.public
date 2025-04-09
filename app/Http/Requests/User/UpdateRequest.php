<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'avatar' => 'nullable|file',
            'surname' => 'nullable|string',
            'pathname' => 'nullable|string',
            'gender' => 'nullable|string',
            'birthdate' => 'nullable|date',
            'mobile' => 'nullable|string',
            'pasport1' => 'nullable|file',
            'pasport2' => 'nullable|file',
            'name' => 'nullable|string',
            'email' => 'nullable|string|email|'. Rule::unique('users', 'email')->ignore($this->id),
            'password' => 'nullable|string',
            'phone' => 'nullable|integer|'. Rule::unique('users', 'phone')->ignore($this->id),
            'group_id' => 'nullable|integer|exists:groups,id'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID не обходима для обработки данных.',
            'id.file' => 'ID должно быть числом.',
            'avatar.file' => 'Аватар должен быть файлом.',
            'surname.string' => 'Фамилия должна быть строкой.',
            'pathname.string' => 'Отчество должно быть строкой.',
            'gender.string' => 'Пол male или female.',
            'birthdate.date' => 'Дата рождения должна быть датой формата ДД-ММ-ГГГГ.',
            'mobile.string' => 'Мобильный должен быть строкой.',
            'pasport1.file' => 'Копия первой страницы паспорта должна быть файлом.',
            'pasport2.file' => 'Копия второй страницы паспорта должна быть файлом.',
            'name.required' => 'Поле имя обязательно для заполнения.',
            'name.string' => 'Имя должно быть строкой.',
            'email.email' => 'Ваша почта должна соответствовать формату mail@gmail.com.',
            'email.unique' => 'Пользователь с таким email уже существует.',
            'phone.string' => 'Телефоный номер должна быть строкой.',
            'phone.unique' => 'Пользователь с таким телефонным номером уже существует.',
            'group_id.integer' => 'Группа должна быть цифрой.',
            'group_id.exists' => 'Такой Группы не существует.'
        ];
    }
}

