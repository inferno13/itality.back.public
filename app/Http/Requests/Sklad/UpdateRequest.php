<?php

namespace App\Http\Requests\Sklad;

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
            'data_start_work' => 'nullable|data:dd/mm/Y',
            'data_end_work' => 'nullable|data:dd/mm/Y',
            'counterparty' => 'nullable|string',
            'cars' => 'nullable|string',
            'sum' => 'nullable|integer',
            'payed' => 'nullable|integer',
            'status' => 'nullable|string',
            'comments' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'date_start_work.data' => 'Поле даты начало работы  для даты.',
            'date_end_work.data' => 'Поле даты начало работы  для даты.',
            'counterparty.string' => 'Это поле для ФИО.',
            'cars.string' => 'Это поле для марки машины.',
            'sum.integer' => 'Поле сумма для числа.',
            'payed.integer' => 'Поле оплачено для числа.',
            'status.string' => 'Поле статус для слова.',
            'comments.string' => 'Поле комментарий для текста.',
        ];
    }
}

