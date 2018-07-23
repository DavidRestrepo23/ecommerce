<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierStoreRequest extends FormRequest
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
            'contactName' => 'required|string',
            'companyName' => 'nullable|string',
            'telephone' => 'nullable|integer',
            'mobile' => 'nullable|integer',
            'email' => 'nullable|email|unique:suppliers',
            'web' => 'nullable|string',
            'description' => 'nullable|string|max:228',
            'address' => 'nullable|string',
            'country' => 'nullable|string',
            'city' => 'nullable|string',
            'municipaly' => 'nullable|string',
            'neighborhood' => 'nullable|string',
            'observations' => 'nullable|string|max:228',
        ];

        if($this->get('logo'))
            $rules = array_merge($rules, ['logo' => 'mimes:jpg,jpeg,png']); 
        return $rules;
    }

    public function messages(){
        
        return [
            'contactName.required' => 'Este campo es requerido',
            'telephone.integer' => 'El campo teléfono solo debe contener numero',
            'mobile.integer' => 'El campo celular solo debe contener numero',
            'description.max' => 'El campo descripción debe tener menos de 228 caracteres',
            'observations.max' => 'El campo descripción debe tener menos de 228 caracteres',
        ];
    }

}
