<?php

namespace App\Http\Requests\Category;

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
            'parent_id' => 'nullable|integer',
            'tab_id' => 'nullable|integer',
            'title' => 'required|string',
            'image' => 'nullable|file|max:2048',
            'color' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'pos.integer' => 'Поле Назваине должно быть текстом.',
            'parent_id.integer' => 'Поле Назваине должно быть текстом.',
            'tab_id.integer' => 'Поле Назваине должно быть текстом.',
            'title.string' => 'Поле Назваине обязательно для заполнения.',
            'image.file' => 'Данное поле должно иметь файловый тип.',
            'image.max' => 'Картинка не должна превышать 2МБ.',
        ];
    }
}

