<?php

namespace App\Modules\Paciente\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearPacienteRequest extends FormRequest
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