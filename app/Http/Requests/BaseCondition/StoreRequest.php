<?php

namespace App\Http\Requests\BaseCondition;

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
            'button_category_id' => 'nullable|integer',
            'base_id' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'button_category_id.integer' => 'Данное поле должно быть числового типа.',
            'base_id.integer' => 'Данное поле должно быть числового типа.',
        ];
    }
}

