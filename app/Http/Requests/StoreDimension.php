<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDimension extends FormRequest
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
            'width' => 'required|integer|max:10000',
            'height' => 'required|integer|max:5000',
            'depth' => 'required|integer|max:3000',
            'type_id' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'width.required' => 'Заполните ширину',
            'width.integer' => 'Только цифры, ширина не больше 10000 мм',
            'width.max' => 'Ширина не больше 10000 мм',
            'height.required' => 'Заполните высоту',
            'height.integer' => 'Только цифры, высота не больше 5000 мм ',
            'height.max' => 'Ввысота не больше 5000 мм ',
            'depth.required' => 'Заполните глубину',
            'depth.integer' => 'Только цифры, глубина не больше 3000 мм ',
            'depth.max' => 'Глубина не больше 3000 мм ',
            'type_id.required' => 'Выберите тип двери',
        ];
    }
}
