<?php

use Illuminate\Support\Facades\Route;
use App\Modules\HistoriaClinica\Http\Controllers\HistoriaClinicaController;

Route::post('/crear', [HistoriaClinicaController::class, 'crear']);