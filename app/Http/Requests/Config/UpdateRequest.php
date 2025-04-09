<?php

namespace App\Http\Requests\Config;

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
            'grouping_id' => 'nullable|integer|exists:config_groupings,id',
            'title' => 'nullable|string',
            'scene_id' => 'nullable|integer|exists:config_scenes,id',
            'assembling_id' => 'nullable|integer|exists:config_assemblings,id',
            'col' => 'nullable|integer',
            'view' => 'nullable|string',
            'type' => 'nullable|string',
            'project_id' => 'nullable|integer|exists:config_projects,id',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID не обходима для обработки.',
            'id.integer' => 'ID должен иметь числовой тип.',
            'active.boolean' => 'Данное поле должно иметь boolean тип.',
            'pos.integer' => 'Данное поле должно иметь числовой тип.',
            'grouping_id.integer' => 'Данное поле должно иметь числовой тип.',
            'grouping_id.exists' => 'Группировки с таким ID не существует.',
            'name.string' => 'Данное поле должно иметь строчный тип.',
            'scene_id.integer' => 'Данное поле должно иметь числовой тип.',
            'assembling_id.exists' => 'Сборка с таким ID не существует.',
            'assembling_id.integer' => 'Данное поле должно иметь числовой тип.',
            'project_id.exists' => 'Проекта с таким ID не существует.',
            'col.integer' => 'Данное поле должно иметь числовой тип.',
            'view.string' => 'Данное поле должно иметь строчный тип.',
            'type.string' => 'Данное поле должно иметь строчный тип.',
            'project_id.integer' => 'Данное поле должно иметь числовой тип.',
        ];
    }
}

