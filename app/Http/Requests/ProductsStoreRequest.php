<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsStoreRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|max:128',
            'summary' => 'nullable|string|max:500',
            'description' => 'nullable|string|max:1000',
            'reference' => 'required|string|unique:products,reference',
            'stock' => 'nullable|integer',
            'supplier_id' => 'nullable',
            'price' => 'required|integer',
            'rate' => 'nullable|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'category_id' => 'nullable|integer',
            'feature_id' => 'nullable|integer',
            'price_specific' => 'nullable|numeric',
            'discount' => 'nullable|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'rate_specific' => 'nullable|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string', 
        ];



        if($this->get('images'))
            $rules = array_merge($rules, ['images' => 'mimes:jpg,jpeg,png']); 
        
            return $rules;

    }

    public function messages()
    {
        return [
            'title.required' => 'El campo título es requerido',
            'title.max' => 'El campo título no puede superar de 128 caracteres',
            'summary.max' => 'El campo resumen no puede superar 128 caracteres ',
            'description.max' => 'El campo Descripción no puede superar mas de 266 caracteres',
            'reference.unique' => 'Esta referencia ya existe',
            'reference.required' => 'El campo referencia es obligatorio ',
            'stock.integer' => 'El campo stock solo debe contener números',
            'price.integer' => 'El campo precio solo debe contener números',
            'price.required' => 'El campo precio es obligatorio',
            'rate.regex' => 'El campo impuesto solo debe contener números',
            'category_id.integer' => 'El campo categoría solo debe contener números',
            'feature_id.integer' => 'El campo característica solo debe contener números',
            'price_specific.integer' => 'El campo precio específico solo debe contener números',
            'discount.regex' => 'El campo descuento solo debe contener números',
            'rate_specific.regex' => 'El campo impuesto solo debe contener números',
            'meta_description.max' => 'El campo Meta descripción no puede superar de 160 caracteres',
            'images.mimes' => 'Las imagenes permitidas son jpg, jpeg, png'
        ];
    }
}
