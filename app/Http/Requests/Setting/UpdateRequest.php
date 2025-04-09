<?php

namespace App\Http\Requests\Setting;

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
            'title' => 'nullable|string',
            'type' => 'nullable|string',
            'value' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID не обходима для обработки данных.',
            'id.integer' => 'ID должен быть числом.',
            'title.string' => 'Значение должно быть строкой.',
            'type.string' => 'Значение должно быть строкой.',
            'value.string' => 'Значение должно быть строкой.',
        ];
    }
}
