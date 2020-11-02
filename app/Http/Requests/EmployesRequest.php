<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployesRequest extends FormRequest
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
            'name' => 'required',
            'surname' => 'required',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email',
            'phone' => 'nullable',
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
            'name.required' => 'Por favor escriba los nombres',
            'surname.required' => 'Por favor escriba los apellidos',
            'company_id.required' => 'Por favor seleccione una compañia del listado, si no hay ninguna, asegurece de primero crear las compañias',
            'company_id.exists' => 'La compañia seleccionada no existe',
            'email.required' => 'Por favor escriba el correo',
            'email.email' => 'Por favor escriba el correo con un formato válido',
            'phone.required' => 'Por favor escriba el teléfono',
        ];
    }
}
