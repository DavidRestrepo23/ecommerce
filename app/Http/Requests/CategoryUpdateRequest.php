<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:120|unique:categories,name,'. $this->id,
            'description' => 'nullable|max:255',
        ];

        if($this->get('file'))
            $rules = array_merge($rules, ['file' => 'mimes:jpg,jpeg,png,gif']); 
            return $rules;
    
    }

    public function messages(){
        return [
            'name.required' => 'El campo nombre es requerido',
            'name.max' => 'El campo nombre debe tener menos de 120 caracteres',
            'name.unique' => 'Esta categoria ya existe',
            'description.max' => 'El campo descripción debe tener menos de 255 caracteres',
        ];
    }
}
