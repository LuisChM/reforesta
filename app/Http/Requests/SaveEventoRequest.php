<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveEventoRequest extends FormRequest
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
            'tema' => 'required',       
            'estado' => 'required',       
            'descripcion' => 'nullable',       
            'direccion' => 'nullable',       
            'distrito' => 'nullable',       
            'lat' => 'nullable',       
            'lng' => 'nullable',       
            'fecha' => 'nullable',       
            'horaInicio' => 'nullable',       
            'horaFinaliza' => 'nullable',       
            'cantidad' => 'nullable',       
        ];
    }
}
