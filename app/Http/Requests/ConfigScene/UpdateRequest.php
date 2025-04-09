<?php

namespace App\Http\Requests\ConfigScene;

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
            'type' => 'nullable|string',
            'config_id' => 'nullable|integer|exists:configs,id', 
            'button' => 'nullable',
            'scene_left' => 'nullable',
            'scene_right' => 'nullable',
            'mask_left' => 'nullable',
            'mask_right' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID не обходима для обработки.',
            'id.integer' => 'ID должен иметь числовой тип.',
            'type.string' => 'Данное поле должно иметь строчный тип.',
        ];
    }
}

