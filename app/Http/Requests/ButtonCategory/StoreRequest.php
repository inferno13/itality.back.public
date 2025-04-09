<?php

namespace App\Http\Requests\ButtonCategory;

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
            'color' => 'nullable|string',
            'image' => 'nullable|file|max:2048',
            'section' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'pos.integer' => 'Данное поле должно иметь числовой тип.',
            'title.string' => 'Данное поле должно иметь строчный тип.',
            'title.required' => 'Поле Назваине обязательно для заполнения.',
            'color.string' => 'Данное поле должно иметь строчный тип.',
            'image.file' => 'Данное поле должно иметь файловый тип.',
            'section.string' => 'Данное поле должно иметь строчный тип.',
            'image.max' => 'Картинка не должна превышать 2МБ.',
        ];
    }
}

