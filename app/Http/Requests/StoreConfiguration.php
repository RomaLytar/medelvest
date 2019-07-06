<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConfiguration extends FormRequest
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
            'title' => 'sometimes|required',
            'image' => 'mimes:jpg,jpeg,png'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Заполните заголовок',
            'image.mimes' => 'Загрузите изображения "Доступны форматы JPG и JPEG, PNG"',
        ];
    }
}
