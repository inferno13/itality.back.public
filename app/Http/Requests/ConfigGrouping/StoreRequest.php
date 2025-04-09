<?php

namespace App\Http\Requests\ConfigGrouping;

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
            'pos' => 'nullable|integer',
            'title' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'pos.integer' => 'Данное поле должно иметь числовой тип.',
            'title.required' => 'Поле Назваине обязательно для заполнения.',
            'title.string' => 'Данное поле должно иметь строчный тип.',
        ];
    }
}

