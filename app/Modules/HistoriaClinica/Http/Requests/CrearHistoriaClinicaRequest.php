<?php

namespace App\Modules\HistoriaClinica\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearHistoriaClinicaRequest extends FormRequest
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