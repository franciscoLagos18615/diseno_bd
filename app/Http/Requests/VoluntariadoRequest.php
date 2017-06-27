<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoluntariadoRequest extends FormRequest
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
             'nombre_medida' => 'required│max:15│alpha',
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'direccion' => 'required│max:50│alpha',
            'personas' => 'required',
            'perfil_voluntario' => 'required│max:20│alpha',
            'tipo_trabajo' => 'required│max:20│alpha',

        ];
    }
}
