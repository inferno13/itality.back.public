<?php

namespace App\Http\Requests\BaseFastener;

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
            'mark' => 'nullable|string',
            'gaps' => 'nullable|string',
            'chamfer' => 'nullable|boolean',
            'scheme' => 'nullable',
            'pdf' => 'nullable|boolean',
            'base_id' => 'nullable|integer|exists:bases,id',
        ];
    }

    public function messages()
    {
        return [
            'id.integer' => 'Данное поле должно иметь числовой тип.',
            'id.required' => 'Данное поле обязательно к заполнению.',
            'mark.string' => 'Данное поле должно иметь строчный тип.',
            'gaps.string' => 'Данное поле должно иметь строчный тип.',
            'scheme.file' => 'Данное поле должно иметь файловый тип.',
            'base_id.integer' => 'Данное поле должно иметь числовой тип.',
            'base_id.exists' => 'Такой кнопки не существует',
            'pdf.boolean' => 'Данное поле должно иметь логический тип.',
            'chamfer.boolean' => 'Данное поле должно иметь логический тип.',
            'scheme.max' => 'Картинка не должна превышать 2МБ.',
        ];
    }
}

