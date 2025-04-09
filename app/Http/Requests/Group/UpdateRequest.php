<?php

namespace App\Http\Requests\Group;

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
          'title' => 'nullable|string',
          'rules' => 'nullable|array'

        ];
    }

  public function messages()
  {
    return [
      'name.string' => 'Имя должно быть строкой.',
      'rules.array' => 'Области доступа должны быть массивом.',
    ];
  }
}

