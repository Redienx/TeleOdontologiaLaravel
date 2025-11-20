<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Antropometria\Http\Controllers\AntropometriaController;

Route::post('/crear', [AntropometriaController::class, 'crear']);