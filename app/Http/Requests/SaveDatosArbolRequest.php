<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveDatosArbolRequest extends FormRequest
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
            'imagen' => 'required|image',
            'nombrePopular' => 'required|unique:datos_arbols,nombrePopular',
            'nombreCientifico' => 'required|unique:datos_arbols,nombreCientifico',
            'descripcion' => 'nullable',       
         ];
    }
}
