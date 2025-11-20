<?php

namespace App\Modules\Odontograma\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Odontograma\Domain\Repositories\OdontogramaRepositoryInterface;
use App\Modules\Odontograma\Infrastructure\Persistence\OdontogramaRepository;

class OdontogramaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            OdontogramaRepositoryInterface::class,
            OdontogramaRepository::class
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
            Route::prefix('api/' . strtolower('Odontograma'))
                ->middleware('api')
                ->group($modulePath . 'routes/api.php');
        }
    }
}