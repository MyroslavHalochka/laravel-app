<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'role' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Обязательное поля для заполнения',
            'name.string' => 'Данные должны быть строковыми',
            'email.required' => 'Обязательное поля для заполнения',
            'email.string' => 'Данные должны быть строковыми',
            'email.email' => 'Данные должны быть строковыми',
            'email.unique' => 'Данные должны быть строковыми'
        ];
    }
}
