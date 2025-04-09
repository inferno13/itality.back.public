<?php

namespace App\Http\Requests\Tag;

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
            'category_id' => 'nullable|integer|exists:categories,id',
            'color' => 'nullable|string',
            ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID необходимо для обоработки.',
            'id.integer' => 'ID должно быть числом.',
            'title.string' => 'В данное поле надо вводить строку.',
            'category_id.integer' => 'В данное поле надо вводить число.',
            'category_id.exists' => 'Такой Категории не существует.',
            'color.string' => 'В данное поле надо вводить строку.',
        ];
    }
}
