<?php

namespace App\Modules\Paciente\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Paciente\Domain\Repositories\PacienteRepositoryInterface;
use App\Modules\Paciente\Infrastructure\Persistence\PacienteRepository;

class PacienteServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            PacienteRepositoryInterface::class,
            PacienteRepository::class
        );
    }

    public function boot()
    {
        $this->loadRoutes();
    }

    private function loadRoutes()
    {
        $modulePath = __DIR__ . '/../../';

        if (file_exists($modulePath . 'routes/api.php')) {
            Route::prefix('api/' . strtolower('Paciente'))
                ->middleware('api')
                ->group($modulePath . 'routes/api.php');
        }
    }
}