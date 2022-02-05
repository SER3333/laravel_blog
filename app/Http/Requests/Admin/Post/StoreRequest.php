<?php

namespace App\Http\Requests\Admin\Post;

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
            'title' => 'required | string',
            'content' => 'required | string',
            'preview_image' => 'required | file',
            'main_image' => 'required | file',
            'category_id' => 'required | exists:categories,id',
            'tag_ids' => 'nullable | array',
            'tag_ids*' => 'nullable | exists:tag,id',
        ];
    }
    public function messages()
    {
        return[
            'title.required' => 'Це поле має бути заповнене',
            'title.string' => 'Ведіть текст',
            'content.required' => 'Це поле має бути заповнене',
            'content.string' => 'Ведіть текст',
            'preview_image.required' => 'Це поле має бути заповнене',
            'preview_image.file' => 'Вибиріть фаїл',
            'main_image.required' => 'Це поле має бути заповнене',
            'main_image.file' => 'Вибиріть фаїл',
            'category_id.required' => 'Це поле має бути заповнене',
            'category_id.exists' => 'Ця категорія повина бути в базі даних',
            'tag_ids.array' => 'Це повинен бути масив',
        ];
    }
}
