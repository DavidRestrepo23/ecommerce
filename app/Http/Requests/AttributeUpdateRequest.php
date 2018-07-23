<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:120|unique:attributes,name,'. $this->attribute,
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El campo nombre es requerido',
            'name.max' => 'El campo nombre debe ser menor de 128 caracteres',
            'name.unique' => 'Ya existe esta característica',
        ];
    }
}
