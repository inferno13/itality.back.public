<?php

namespace App\Http\Requests\BaseMagnet;

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
            'mark' => 'nullable|string',
            'gaps' => 'nullable|string',
            'comment' => 'nullable|string',
            'base_id' => 'nullable|integer|exists:bases,id',
        ];
    }

    public function messages()
    {
        return [
            'mark.string' => 'Данное поле должно иметь строчный тип.',
            'gaps.string' => 'Данное поле должно иметь строчный тип.',
            'base_id.integer' => 'Данное поле должно иметь числовой тип.',
            'base_id.exists' => 'Такой кнопки не существует',
            'comment.string' => 'Данное поле должно иметь строчный тип.'
        ];
    }
}

