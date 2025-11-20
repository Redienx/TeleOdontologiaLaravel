<?php

namespace App\Modules\Odontograma\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearOdontogramaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // reglas de validación
        ];
    }
}