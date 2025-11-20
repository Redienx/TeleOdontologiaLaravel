<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Pacientes\Http\Controllers\PacientesController;

Route::post('/crear', [PacientesController::class, 'crear']);