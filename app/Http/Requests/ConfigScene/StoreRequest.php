<?php

namespace App\Http\Requests\ConfigScene;

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
            'type' => 'nullable|string',
            'config_id' => 'nullable|integer|exists:configs,id', 
            'button' => 'nullable|file',
            'scene_left' => 'nullable|file',
            'scene_right' => 'nullable|file',
            'mask_left' => 'nullable|file',
            'mask_right' => 'nullable|file',
        ];
    }

    public function messages()
    {
        return [
            'type.string' => 'Данное поле должно иметь строчный тип.',
            'button.file' => 'Данное поле должно иметь файловый тип.',
            'scene_left.file' => 'Данное поле должно иметь файловый тип.',
            'scene_right.file' => 'Данное поле должно иметь файловый тип.',
            'mask_left.file' => 'Данное поле должно иметь файловый тип.',
            'mask_right.file' => 'Данное поле должно иметь файловый тип.',
        ];
    }
}

