<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCombinationStoreRequest extends FormRequest
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
            'productId' => 'required',
            'combination.*' => 'required|unique:product_combinations,combination',
        ];
    }   


    public function messages()
    {
        return [
            'combination.required' => 'El campo combinación es requerido',
            'combination.unique' => 'Esta combinación ya existe' 
        ];
    }

}
