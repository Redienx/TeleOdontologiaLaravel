<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Odontograma\Http\Controllers\OdontogramaController;

Route::post('/crear', [OdontogramaController::class, 'crear']);