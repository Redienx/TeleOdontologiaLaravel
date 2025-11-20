<?php

namespace App\Modules\Pacientes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearPacientesRequest extends FormRequest
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