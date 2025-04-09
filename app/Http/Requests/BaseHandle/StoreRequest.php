<?php

namespace App\Http\Requests\BaseHandle;

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
            'option_1' => 'nullable|integer',
            'option_2' => 'nullable|integer',
            'option_3' => 'nullable|integer',
            'option_4' => 'nullable|integer',
            'option_5' => 'nullable|integer',
            'option_6' => 'nullable|integer',
            'option_7' => 'nullable|integer',
            'option_8' => 'nullable|integer',
            'option_9' => 'nullable|integer',
            'base_id' => 'nullable|integer|exists:bases,id',
        ];
    }

    public function messages()
    {
        return [
            'option_1.integer' => 'Данное поле должно иметь числовой тип.',
            'option_2.integer' => 'Данное поле должно иметь числовой тип.',
            'option_3.integer' => 'Данное поле должно иметь числовой тип.',
            'option_4.integer' => 'Данное поле должно иметь числовой тип.',
            'option_5.integer' => 'Данное поле должно иметь числовой тип.',
            'option_6.integer' => 'Данное поле должно иметь числовой тип.',
            'option_7.integer' => 'Данное поле должно иметь числовой тип.',
            'option_8.integer' => 'Данное поле должно иметь числовой тип.',
            'option_9.integer' => 'Данное поле должно иметь числовой тип.',
            'base_id.integer' => 'Данное поле должно иметь числовой тип.',
            'base_id.exists' => 'Такой кнопки не существует',
        ];
    }
}

