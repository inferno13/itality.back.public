<?php

namespace App\Http\Requests\ConfigAssembling;

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
            'config_id' => 'nullable|integer|exists:configs,id',
            'base_id' => 'nullable|integer|exists:bases,id',
            'image' => 'nullable|file|max:2048',
            'ishower_on' => 'nullable|boolean',
            'ishower_default' => 'nullable|boolean',
            'dushmaster_on' => 'nullable|boolean',
            'dushmaster_default' => 'nullable|boolean',
            'itality_on' => 'nullable|boolean',
            'itality_default' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID не обходима для обработки.',
            'id.integer' => 'ID должен иметь числовой тип.',
            'config_id.integer' => 'Данное поле должно иметь числовой тип.',
            'config_id.exists' => 'Конфигурация не найдена.',
            'base_id.integer' => 'Данное поле должно иметь числовой тип.',
            'base_id.exists' => 'Кнопка не найдена.',
            'image.max' => 'Данное поле должно иметь максимум 2048 байт.',
            'image.file' => 'Данное поле должно иметь файлвый тип.',
            'ishower_on.boolean' => 'Данное поле должно иметь boolean тип.',
            'ishower_default.boolean' => 'Данное поле должно иметь boolean тип.',
            'dushmaster_on.boolean' => 'Данное поле должно иметь boolean тип.',
            'dushmaster_default.boolean' => 'Данное поле должно иметь boolean тип.',
            'itality_on.boolean' => 'Данное поле должно иметь boolean тип.',
            'itality_default.boolean' => 'Данное поле должно иметь boolean тип.',
        ];
    }
}

