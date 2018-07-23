<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryStoreRequest extends FormRequest
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
            'category_id' => 'required',
            'name' => 'required|string|max:120|unique:subcategories,name',
            'description' => 'nullable|max:255',
        ];

        if($this->get('file'))
            $rules = array_merge($rules, ['file' => 'mimes:jpg,jpeg,png,gif']); 
            return $rules;
    
    }

    public function messages(){
        return [
            'category_id.required' => 'Debes seleccionar la categoria padre',
            'name.required' => 'El campo nombre es requerido',
            'name.max' => 'El campo nombre debe tener menos de 120 caracteres',
            'name.unique' => 'Ya existe esta categoría',
            'description.max' => 'El campo descripción debe tener menos de 255 caracteres',
        ];
    }
}
