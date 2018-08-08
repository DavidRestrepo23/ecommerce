<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionsStoreRequest extends FormRequest
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
            'price' => 'required',
            'discount' => 'required|not_in:0',
            'product_id' => 'required|unique:promotions',
            'ends_at' => 'required',
            'start_at' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'price.required' => 'El precio es requerido',
            'product_id.unique' => 'unico',
            'ends_at.required' => 'La fecha final es requerida',
            'start_at.required' => 'La fecha inicial es requerida',
            'discount.required' => 'El descuento es requerido',
            'discount.not_in' => 'El descuento debe ser mayor de 0',
        ];
    }
}
