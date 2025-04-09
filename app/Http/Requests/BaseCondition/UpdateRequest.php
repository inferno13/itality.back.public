<?php

namespace App\Http\Requests\BaseCondition;

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
            'button_category_id' => 'nullable|integer|exists:button_categories,id',
            'base_id' => 'nullable|integer|exists:bases,id',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Данное поле обязательно для заполнения.',
            'id.integer' => 'Данное поле должно быть числового типа.',
            'button_category_id.integer' => 'Данное поле должно быть числового типа.',
            'button_category_id.exists' => 'Такой Категории Кнопок не существует.',
            'base_id.integer' => 'Данное поле должно быть числового типа.',
            'base_id.exists' => 'Такой кнопки не существует.',
        ];
    }
}

