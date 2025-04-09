<?php

namespace App\Http\Requests\Collection;

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
            'pos' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Данное поле не обходима для обработки.',
            'id.integer' => 'Данное поле должно иметь числовой тип.',
            'title.string' => 'Данное поле должно иметь строчний тип.',
            'pos.integer' => 'Данное поле должно иметь числовой тип.',
        ];
    }
}

