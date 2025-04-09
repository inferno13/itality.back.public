<?php

namespace App\Http\Requests\ConfigProject;

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
            
            'scheme' => 'nullable|file',
            'walkin' => 'nullable|file',
            'inside' => 'nullable|file',
            'outside' => 'nullable|file',
            'outin' => 'nullable|file',
            'sliding' => 'nullable|file',

            'coord_x' => 'nullable|integer',
            'coord_y' => 'nullable|integer',
            'turn' => 'nullable|integer',
            'config_id' => 'nullable|integer|exists:configs,id', 
            'select_1' => 'nullable|string',
            'value_1' => 'nullable|integer',
            'select_2' => 'nullable|string',
            'select_3' => 'nullable|string',
            'value_2' => 'nullable|integer',
            'select_4' => 'nullable|string',
            'select_5' => 'nullable|string',
            'select_6' => 'nullable|string',
            'select_7' => 'nullable|string',
            'select_8' => 'nullable|string',
            'select_9' => 'nullable|string',
            'select_10' => 'nullable|string',
            'select_11' => 'nullable|string',
            'value_3' => 'nullable|integer',
            'select_12' => 'nullable|string',
            'select_13' => 'nullable|string',
            'select_14' => 'nullable|string',
            
            'coord_x_2' => 'nullable|integer',
            'coord_y_2' => 'nullable|integer',
            'turn_2' => 'nullable|integer',
            'value_1_2' => 'nullable|integer',
            'value_2_2' => 'nullable|integer',
            'value_3_2' => 'nullable|integer',
            'select_1_2' => 'nullable|string',
            'select_2_2' => 'nullable|string',
            'select_3_2' => 'nullable|string',
            'select_4_2' => 'nullable|string',
            'select_5_2' => 'nullable|string',
            'select_6_2' => 'nullable|string',
            'select_7_2' => 'nullable|string',
            'select_8_2' => 'nullable|string',
            'select_9_2' => 'nullable|string',
            'select_10_2' => 'nullable|string',
            'select_11_2' => 'nullable|string',
            'select_12_2' => 'nullable|string',
            'select_13_2' => 'nullable|string',
            'select_14_2' => 'nullable|string',

            'coord_x_3' => 'nullable|integer',
            'coord_y_3' => 'nullable|integer',
            'turn_3' => 'nullable|integer',
            'value_1_3' => 'nullable|integer',
            'value_2_3' => 'nullable|integer',
            'value_3_3' => 'nullable|integer',
            'select_1_3' => 'nullable|string',
            'select_2_3' => 'nullable|string',
            'select_3_3' => 'nullable|string',
            'select_4_3' => 'nullable|string',
            'select_5_3' => 'nullable|string',
            'select_6_3' => 'nullable|string',
            'select_7_3' => 'nullable|string',
            'select_8_3' => 'nullable|string',
            'select_9_3' => 'nullable|string',
            'select_10_3' => 'nullable|string',
            'select_11_3' => 'nullable|string',
            'select_12_3' => 'nullable|string',
            'select_13_3' => 'nullable|string',
            'select_14_3' => 'nullable|string',

            'coord_x_4' => 'nullable|integer',
            'coord_y_4' => 'nullable|integer',
            'turn_4' => 'nullable|integer',
            'value_1_4' => 'nullable|integer',
            'value_2_4' => 'nullable|integer',
            'value_3_4' => 'nullable|integer',
            'select_1_4' => 'nullable|string',
            'select_2_4' => 'nullable|string',
            'select_3_4' => 'nullable|string',
            'select_4_4' => 'nullable|string',
            'select_5_4' => 'nullable|string',
            'select_6_4' => 'nullable|string',
            'select_7_4' => 'nullable|string',
            'select_8_4' => 'nullable|string',
            'select_9_4' => 'nullable|string',
            'select_10_4' => 'nullable|string',
            'select_11_4' => 'nullable|string',
            'select_12_4' => 'nullable|string',
            'select_13_4' => 'nullable|string',
            'select_14_4' => 'nullable|string',

            'coord_x_5' => 'nullable|integer',
            'coord_y_5' => 'nullable|integer',
            'turn_5' => 'nullable|integer',
            'value_1_5' => 'nullable|integer',
            'value_2_5' => 'nullable|integer',
            'value_3_5' => 'nullable|integer',
            'select_1_5' => 'nullable|string',
            'select_2_5' => 'nullable|string',
            'select_3_5' => 'nullable|string',
            'select_4_5' => 'nullable|string',
            'select_5_5' => 'nullable|string',
            'select_6_5' => 'nullable|string',
            'select_7_5' => 'nullable|string',
            'select_8_5' => 'nullable|string',
            'select_9_5' => 'nullable|string',
            'select_10_5' => 'nullable|string',
            'select_11_5' => 'nullable|string',
            'select_12_5' => 'nullable|string',
            'select_13_5' => 'nullable|string',
            'select_14_5' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'ID не обходима для обработки.',
            'id.integer' => 'ID должен иметь числовой тип.',
            'coord_x.integer' => 'Данное поле должно иметь числовой тип.',
            'coord_y.integer' => 'Данное поле должно иметь числовой тип.',
            'turn.integer' => 'Данное поле должно иметь числовой тип.',
            'scheme.file' => 'Данное поле должно иметь файловый тип.',
            'walkin.file' => 'Данное поле должно иметь файловый тип.',
            'inside.file' => 'Данное поле должно иметь файловый тип.',
            'outside.file' => 'Данное поле должно иметь файловый тип.',
            'outin.file' => 'Данное поле должно иметь файловый тип.',
            'sliding.file' => 'Данное поле должно иметь файловый тип.',
            'select_1.string' => 'Данное поле должно иметь строчный тип.',
            'value_1.integer' => 'Данное поле должно иметь числовой тип.',
            'select_2.string' => 'Данное поле должно иметь строчный тип.',
            'select_3.string' => 'Данное поле должно иметь строчный тип.',
            'value_2.integer' => 'Данное поле должно иметь числовой тип.',
            'select_4.string' => 'Данное поле должно иметь строчный тип.',
            'select_5.string' => 'Данное поле должно иметь строчный тип.',
            'select_6.string' => 'Данное поле должно иметь строчный тип.',
            'select_7.string' => 'Данное поле должно иметь строчный тип.',
            'select_8.string' => 'Данное поле должно иметь строчный тип.',
            'select_9.string' => 'Данное поле должно иметь строчный тип.',
            'select_10.string' => 'Данное поле должно иметь строчный тип.',
            'select_11.string' => 'Данное поле должно иметь строчный тип.',
            'value_3.integer' => 'Данное поле должно иметь числовой тип.',
            'select_12.string' => 'Данное поле должно иметь строчный тип.',
            'select_13.string' => 'Данное поле должно иметь строчный тип.',
            'select_14.string' => 'Данное поле должно иметь строчный тип.',
        ];
    }
}

