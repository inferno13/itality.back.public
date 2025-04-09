<?php

namespace App\Http\Requests\Collection;

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
            'title' => 'required|string',
            'pos' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'title.string' => 'Данное поле должно иметь строчний тип.',
            'title.required' => 'Поле Назваине обязательно для заполнения.',
            'pos.integer' => 'Данное поле должно иметь числовой тип.',
        ];
    }
}

