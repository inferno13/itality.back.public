<?php

namespace App\Http\Requests\Sklad;

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
            'date_start_work' => 'required|date:dd/mm/Y',
            'date_end_work' => 'nullable|date:dd/mm/Y',
            'counterparty' => 'required|string',
            'cars' => 'required|string',
            'sum' => 'nullable|integer',
            'payed' => 'nullable|integer',
            'status' => 'required|string',
            'comments' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'date_start_work.required' => 'Поле дата начало работы обязательно для заполнения.',
            'date_start_work.date' => 'Поле дата начало работы для даты.',
            'date_end_work.date' => 'Поле дата завершение работы для даты.',
            'counterparty.required' => 'Поле контрагент обязательно для заполнения.',
            'counterparty.string' => 'Поле контрагент для ФИО.',
            'cars.string' => 'Поле авто для марки машины.',
            'cars.required' => 'Поле авто обязательно для заполнения.',
            'sum.integer' => 'Поле сумма для числа.',
            'payed.integer' => 'Поле оплачено для числа.',
            'status.required' => 'Поле статус обязательно для заполнения.',
            'status.string' => 'Поле статус для слова.',
            'comments.string' => 'Поле комментарий для текста.',
        ];
    }
}

