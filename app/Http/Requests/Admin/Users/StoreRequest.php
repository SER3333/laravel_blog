<?php

namespace App\Http\Requests\Admin\Users;

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
            'name' => 'required | string | max:255',
            'email' => 'required | string | email | max:255 | unique:users',
            'role_id' => 'nullable | integer',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Ведіть імя',
            'name.string' => 'Ведіть текст',
            'email.required' => 'Ведіть email',
            'email.email' => 'Ведіть email',
            'email.unique:users' => 'Цей email вже зареєстрований',
        ];
    }
}
