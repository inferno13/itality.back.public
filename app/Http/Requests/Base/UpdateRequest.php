<?php

namespace App\Http\Requests\Base;

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
            'active' => 'nullable|boolean',
            'pos' => 'nullable|integer',
            'type_id' => 'nullable|integer',
            'button_category_id' => 'nullable|integer|exists:button_categories,id',
            'grouping_id' => 'nullable|integer|exists:groupings,id',
            'title' => 'nullable|string',
            'image' => 'nullable|max:2048',
            'property' => 'nullable|string',
            'structure' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Данное поле объязательно для заполнения.',
            'id.integer' => 'Данное поле должно иметь числовой тип.',
            'active.boolean' => 'Данное поле должно иметь boolean тип.',
            'pos.integer' => 'Данное поле должно иметь числовой тип.',
            'button_category_id.integer' => 'Данное поле должно иметь числовой тип.',
            'button_category_id.exists' => 'Такой Категории Кнопок не существует.',
            'grouping_id.exists' => 'Такой Группировки не существует.',
            'grouping_id.integer' => 'Данное поле должно иметь числовой тип.',
            'name.string' => 'Данное поле должно иметь строчный тип.',
            'image.file' => 'Данное поле должно иметь файловый тип.',
            'property.string' => 'В это поле надо строчный файл.',
            'structure.string' => 'В это поле надо строчный файл.',
            'image.max' => 'Картинка не должна превышать 2МБ.',
        ];
    }
}

