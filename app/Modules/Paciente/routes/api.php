<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Paciente\Http\Controllers\PacienteController;

Route::post('/crear', [PacienteController::class, 'crear']);