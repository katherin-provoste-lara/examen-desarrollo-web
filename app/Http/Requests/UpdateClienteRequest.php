<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */


    public function rules(): array
    {
        return [
            'rut_empresa'     => [
                'required',
                'string',
                Rule::unique('clients', 'rut_empresa')->ignore($this->route('cliente')),
            ],
            'rubro'           => 'required|string|max:255',
            'razon_social'    => 'required|string|max:255',
            'telefono'        => 'required|string|max:20',
            'direccion'       => 'required|string|max:255',
            'nombre_contacto' => 'required|string|max:255',
            'email_contacto'  => 'required|email',
        ];
    }
}
