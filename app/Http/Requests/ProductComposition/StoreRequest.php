<?php

namespace App\Http\Requests\ProductComposition;

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
            'button_id' => 'nullable|integer|exists:bases,id',
            'product_id' => 'nullable|integer|exists:products,id',
            'count' => 'nullable|integer',
            ];
    }

    public function messages()
    {
        return [
            'button_id.integer' => 'В данное поле надо вводить число.',
            'button_id.exists' => 'Такой Категории Кнопок не существует.',
            'product_id.integer' => 'В данное поле надо вводить число.',
            'product_id.exists' => 'Такого Продукта не существует.',
            'count.integer' => 'В данное поле надо вводить число.',
        ];
    }
}
