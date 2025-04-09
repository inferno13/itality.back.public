<?php

namespace App\Http\Requests\Product;

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
            'image' => 'nullable|max:2048',
            'category_id' => 'nullable|integer|exists:categories,id',
            'title' => 'nullable|string',
            'cash' => 'nullable|integer',
            'remains' => 'nullable|integer',
            'shipment' => 'nullable|integer',
            'qr' => 'nullable|string',
            'collection_id' => 'nullable|integer|exists:collections,id',
            'supplier_id' => 'nullable|integer|exists:suppliers,id',
            'norma' => 'nullable|integer',
            'video' => 'nullable|string',
            'unit' => 'nullable|string',
            'text' => 'nullable|string',
            'period' => 'nullable|integer',
            'active' => 'nullable|boolean',
            'fix' => 'nullable|boolean',
            'color' => 'nullable|string',

        ];
    }

    public function messages()
    {
        return [
            'id.integer' => 'Данное поле должно иметь числовой тип.',
            'id.required' => 'Данное поле обязательно для заполнения.',
            'pos.integer' => 'Данное поле должно иметь числовой тип.',
            'category_id.integer' => 'Данное поле должно иметь числовой тип.',
            'category_id.exists' => 'Такой категории не существует.',
            'title.string' => 'Поле Наименование должен быть текстом.',
            'cash.integer' => 'Данное поле должно иметь числовой тип.',
            'remains.integer' => 'Данное поле должно иметь числовой тип.',
            'shipment.integer' => 'Данное поле должно иметь числовой тип.',
            'qr.string' => 'Данное поле должно иметь строчний тип.',
            'collection_id.integer' => 'Данное поле должно иметь числовой тип.',
            'supplier_id.integer' => 'Данное поле должно иметь числовой тип.',
            'norma.integer' => 'Данное поле должно иметь числовой тип.',
            'period.integer' => 'Данное поле должно иметь числовой тип.',
            'video.string' => 'Данное поле должно иметь строчний тип.',
            'unit.string' => 'Данное поле должно иметь строчний тип.',
            'text.string' => 'Данное поле должно иметь строчний тип.',
            'active.string' => 'Данное поле должно иметь boolean тип.',
            'fix.string' => 'Данное поле должно иметь boolean тип.',
            'collection_id.exists' => 'Такой категории не существует.',
            'supplier_id.exists' => 'Такого поставщика не существует.',
            'color.string' => 'Данное поле должно иметь строчный тип.',
            'image.max' => 'Картинка не должна превышать 2МБ.',
        ];
    }
}

