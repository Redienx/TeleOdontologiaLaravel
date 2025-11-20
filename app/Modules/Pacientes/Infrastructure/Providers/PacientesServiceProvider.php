<?php

namespace App\Modules\Pacientes\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Pacientes\Domain\Repositories\PacientesRepositoryInterface;
use App\Modules\Pacientes\Infrastructure\Persistence\PacientesRepository;

class PacientesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            PacientesRepositoryInterface::class,
            PacientesRepository::class
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
            Route::prefix('api/' . strtolower('Pacientes'))
                ->middleware('api')
                ->group($modulePath . 'routes/api.php');
        }
    }
}