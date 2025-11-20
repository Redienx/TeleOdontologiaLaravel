<?php

namespace App\Modules\Antropometria\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearAntropometriaRequest extends FormRequest
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