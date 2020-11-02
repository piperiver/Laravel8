<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaniesRequest extends FormRequest
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
            'email' => 'nullable|email',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
            'web' => 'nullable|url',
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
            'name.required' => 'Por favor escriba el nombre',
            'email.required' => 'Por favor escriba el correo',
            'email.email' => 'Por favor escriba el correo con un formato válido',
            'logo.required' => 'Por favor cargue el logo',
            'logo.image' => 'Por favor cargue el logo en formato jpeg, png, bmp, gif, svg, webp',
            'logo.dimensions' => 'El logo debe ser de mínimo 100 x 100',
            'web.required' => 'Por favor escriba la url',
            'web.url' => 'Por favor escriba la url con un formato válido',
        ];
    }
}
