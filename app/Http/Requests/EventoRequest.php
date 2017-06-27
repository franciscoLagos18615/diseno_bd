<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
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
           'nombre_medida' => 'required│max:25│alpha',
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'hora' => 'required',
            'meta' => 'required',
        ];

        

    }
}