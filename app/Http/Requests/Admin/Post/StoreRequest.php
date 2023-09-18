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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Обязательное поля для заполнения',
            'title.string' => 'Данные должны быть строковыми',
            'content.required' => 'Обязательное поля для заполнения',
            'content.string' => 'Данные должны быть строковыми',
            'preview_image.required' => 'Обязательное поля для заполнения',
            'preview_image.file' => 'Выберите файл',
            'category_id.required' => 'Обязательное поля для заполнения',
            'category_id.integer' => 'Id категории должно быть числом',
            'category_id.exists' => 'Id категории должен существовать',
            'tag_ids.array' => 'Необходимо отправить массив данных'
        ];
    }
}
