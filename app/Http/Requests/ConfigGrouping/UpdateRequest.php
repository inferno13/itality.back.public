<?php

namespace App\Http\Requests\ConfigGrouping;

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
            'title' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Данное поле объязательно для заполнения.',
            'id.integer' => 'Данное поле должно иметь числовой тип.',
            'pos.integer' => 'Данное поле должно иметь числовой тип.',
            'title.string' => 'Данное поле должно иметь строчный тип.',
        ];
    }
}

