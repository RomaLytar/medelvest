<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreColor extends FormRequest
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
            'title' => 'required',
            'type' => 'required',
            'configuration_id' => 'required',
            'price' => 'integer',
            'image' => 'mimes:jpg,jpeg,png'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Заполните заголовок',
            'type.required' => 'Выбирите тип',
            'price.integer' => 'Только цифры',
            'configuration_id.required' => 'Выбирите конфигурацию',
            'image.mimes' => 'Загрузите изображения "Доступны форматы JPG и JPEG, PNG"'
        ];
    }
}
