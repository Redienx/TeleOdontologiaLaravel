<?php

namespace App\Modules\Antropometria\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Antropometria\Domain\Repositories\AntropometriaRepositoryInterface;
use App\Modules\Antropometria\Infrastructure\Persistence\AntropometriaRepository;

class AntropometriaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            AntropometriaRepositoryInterface::class,
            AntropometriaRepository::class
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
            Route::prefix('api/' . strtolower('Antropometria'))
                ->middleware('api')
                ->group($modulePath . 'routes/api.php');
        }
    }
}