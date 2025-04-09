<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

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
            'pos' => 'nullable|integer',
            'parent_id' => 'nullable|integer',
            'tab_id' => 'nullable|integer|exists:base_tabs,id',
            'title' => 'nullable|string',
            'image' => 'nullable|max:2048',
            'color' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Данное поле обязательно для заполнения.',
            'id.integer' => 'Данное поле должно быть числового типа.',
            'pos.integer' => 'Поле Назваине должно быть числового типа.',
            'parent_id.integer' => 'Поле Назваине должно быть числового типа.',
            'tab_id.integer' => 'Поле Назваине должно быть числового типа.',
            'tab_id.exists' => 'Такого Таба не существует.',
            'title.string' => 'Данное поле должно быть строчного типа.',
            'image.max' => 'Картинка не должна превышать 2МБ.',
        ];
    }
}

