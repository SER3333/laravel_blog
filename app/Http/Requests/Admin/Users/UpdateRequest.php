<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'email' => 'required | string |email | unique:users,email,'.$this->user_id,
            'user_id' => 'required | exists:users,id',
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
        ];
    }
}
