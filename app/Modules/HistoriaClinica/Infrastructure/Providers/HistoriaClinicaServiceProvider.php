<?php

namespace App\Modules\HistoriaClinica\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\HistoriaClinica\Domain\Repositories\HistoriaClinicaRepositoryInterface;
use App\Modules\HistoriaClinica\Infrastructure\Persistence\HistoriaClinicaRepository;

class HistoriaClinicaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            HistoriaClinicaRepositoryInterface::class,
            HistoriaClinicaRepository::class
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
            Route::prefix('api/' . strtolower('HistoriaClinica'))
                ->middleware('api')
                ->group($modulePath . 'routes/api.php');
        }
    }
}