<?php

namespace App\Http\Requests\Condition;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'base_condition_id' => 'nullable|integer|exists:base_conditions,id',
            'tag_id' => 'nullable|integer|exists:tags,id',
            'base_id' => 'nullable|integer|exists:bases,id',
        ];
    }

    public function messages()
    {
        return [
            'base_condition_id.integer' => 'Данное поле должно быть числового типа.',
            'base_condition_id.exists' => 'Такой Категории Кнопок не существует.',
            'tag_id.integer' => 'Данное поле должно быть числового типа.',
            'tag_id.exists' => 'Такой кнопки не существует.',
            'base_id.integer' => 'Данное поле должно быть числового типа.',
            'base_id.exists' => 'Такой кнопки не существует.',
        ];
    }
}

