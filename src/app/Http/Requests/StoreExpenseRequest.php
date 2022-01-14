<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
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
            'description' => 'required|string|min:3',
            'amount' => 'required|numeric|gt:0'
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'description.required' => 'El campo :attribute es requerido',
            'description.string'  => 'El campo :attribute debe ser una cadena de caracteres',
            'description.min'  => 'El campo :attribute debe ser mayor a :min caracteres',
            'amount.required' => 'El campo :attribute es requerido',
            'amount.numeric'  => 'El campo :attribute debe ser numerico',
            'amount.gt'  => 'El campo :attribute debe ser mayor a :value',
        ];
    }
}
