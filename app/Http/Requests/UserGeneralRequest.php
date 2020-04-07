<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserGeneralRequest extends FormRequest
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
            'date_of_birth' => 'required|date',
            'country' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'profession' => 'required'
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
            'date_of_birth.required' => 'La fecha de nacimiento es requerida.',
            'date_of_birth.date' => 'Debe introducir una fecha de nacimiento válida.',
            'country.required' => 'El pais es requerido.',
            'city.required' => 'La ciudad es requerida.',
            'gender.required' => 'El genero es requerido.',
            'profession.required' => 'La profesión es requerida.'
        ];
    }
}
