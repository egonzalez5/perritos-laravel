<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class PerritoRequest extends FormRequest
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
                'nombre' => ['required', Rule::unique('perritos')->ignore($this->perrito)],
                'color' => 'required',
                'raza' => 'required',
                'nacimiento' => 'required',
            ];
    }
     public function messages()
    {
         return [
            'nombre.*' => 'El nombre es obligatorio y debe ser único',
            'color.required' => 'El color es obligatorio',
            'raza.required' => 'La raza es obligatoria',
            'nacimiento.required' => 'La fecha de nacimiento es obligatoria',
        ]; 
    } 
}
