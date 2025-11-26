<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeModuleCommand extends Command
{
    protected $signature = 'make:module {name}';
    protected $description = 'Crea un módulo con estructura DDD en app/Modules y la estructura en react correspondiente';

    public function handle()
    {
        $name = $this->argument('name');
        $fs = new Filesystem();

        $modulePath = base_path("app/Modules/{$name}");
        $moduleFrontendPath = base_path("resources/js/Modules/{$name}");

        if ($fs->exists($modulePath and $fs->exists($moduleFrontendPath))) {
            $this->error("El módulo {$name} ya existe.");
            return;
        }


        // Crear estructura frontend
        $foldersFrontend = [
            "components",
            "pages",
            "context",
            "services",
            "utils",
        ];

        // Carpetas del módulo
        $folders = [
            "Domain/Entities",
            "Domain/ValueObjects",
            "Domain/Repositories",
            "Application/Services",
            "Infrastructure/Persistence",
            "Infrastructure/Providers",
            "Infrastructure/Models",
            "Http/Controllers",
            "Http/Requests",
            "routes",
        ];

        foreach ($folders as $folder) {
            $fs->makeDirectory("{$modulePath}/{$folder}", 0755, true);
        }

        foreach ($foldersFrontend as $folder) {
            $fs->makeDirectory("{$moduleFrontendPath}/{$folder}", 0755, true);
        }

        // Crear archivos base
        $fs->put("{$modulePath}/Domain/Entities/{$name}.php", $this->entityTemplate($name));
        $fs->put("{$modulePath}/Domain/Repositories/{$name}RepositoryInterface.php", $this->repositoryInterfaceTemplate($name));
        $fs->put("{$modulePath}/Application/Services/Crear{$name}Service.php", $this->serviceTemplate($name));
        $fs->put("{$modulePath}/Infrastructure/Persistence/{$name}Repository.php", $this->repositoryTemplate($name));
        $fs->put("{$modulePath}/Infrastructure/Providers/{$name}ServiceProvider.php", $this->providerTemplate($name));
        $fs->put("{$modulePath}/Http/Controllers/{$name}Controller.php", $this->controllerTemplate($name));
        $fs->put("{$modulePath}/Http/Requests/Crear{$name}Request.php", $this->requestTemplate($name));
        $fs->put("{$modulePath}/routes/api.php", $this->routesTemplate($name));

        // Registrar provider en config/app.php
        $this->registerServiceProvider($name);

        $this->info("Módulo {$name} creado correctamente y registrado.");
    }

    private function registerServiceProvider($name)
    {
        $providerNamespace = "App\\Modules\\{$name}\\Infrastructure\\Providers\\{$name}ServiceProvider::class,";

        $configFile = base_path('config/app.php');
        $content = file_get_contents($configFile);

        // Insertar provider en la sección `providers`
        $updated = preg_replace(
            '/(\'providers\'\s*=>\s*\[)/',
            "$1\n        {$providerNamespace}",
            $content
        );

        file_put_contents($configFile, $updated);
    }

    private function entityTemplate($name)
    {
        return <<<PHP
<?php

namespace App\Modules\\{$name}\Domain\Entities;

class {$name}
{
    public function __construct(
        public string \$id
    ) {}
}
PHP;
    }

    private function repositoryInterfaceTemplate($name)
    {
        return <<<PHP
<?php

namespace App\Modules\\{$name}\Domain\Repositories;

interface {$name}RepositoryInterface
{
    public function crear(array \$data);
    public function obtenerPorId(string \$id);
}
PHP;
    }

    private function serviceTemplate($name)
    {
        return <<<PHP
<?php

namespace App\Modules\\{$name}\Application\Services;

use App\Modules\\{$name}\Domain\Repositories\\{$name}RepositoryInterface;

class Crear{$name}Service
{
    public function __construct(private {$name}RepositoryInterface \$repo) {}

    public function ejecutar(array \$data)
    {
        return \$this->repo->crear(\$data);
    }
}
PHP;
    }

    private function repositoryTemplate($name)
    {
        return <<<PHP
<?php

namespace App\Modules\\{$name}\Infrastructure\Persistence;

use App\Modules\\{$name}\Domain\Repositories\\{$name}RepositoryInterface;

class {$name}Repository implements {$name}RepositoryInterface
{
    public function crear(array \$data)
    {
        // Implementar persistencia
    }

    public function obtenerPorId(string \$id)
    {
        // Implementar consulta
    }
}
PHP;
    }

    private function providerTemplate($name)
    {
        return <<<PHP
<?php

namespace App\Modules\\{$name}\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\\{$name}\Domain\Repositories\\{$name}RepositoryInterface;
use App\Modules\\{$name}\Infrastructure\Persistence\\{$name}Repository;

class {$name}ServiceProvider extends ServiceProvider
{
    public function register()
    {
        \$this->app->bind(
            {$name}RepositoryInterface::class,
            {$name}Repository::class
        );
    }

    public function boot()
    {
        \$this->loadRoutes();
    }

    private function loadRoutes()
    {
        \$modulePath = __DIR__ . '/../../';

        if (file_exists(\$modulePath . 'routes/api.php')) {
            Route::prefix('api/' . strtolower('{$name}'))
                ->middleware('api')
                ->group(\$modulePath . 'routes/api.php');
        }
    }
}
PHP;
    }

    private function controllerTemplate($name)
    {
        return <<<PHP
<?php

namespace App\Modules\\{$name}\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\\{$name}\Application\Services\Crear{$name}Service;
use App\Modules\\{$name}\Http\Requests\Crear{$name}Request;

class {$name}Controller extends Controller
{
    public function crear(Crear{$name}Request \$request, Crear{$name}Service \$service)
    {
        return \$service->ejecutar(\$request->validated());
    }
}
PHP;
    }

    private function requestTemplate($name)
    {
        return <<<PHP
<?php

namespace App\Modules\\{$name}\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Crear{$name}Request extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // reglas de validación
        ];
    }
}
PHP;
    }

    private function routesTemplate($name)
    {
        return <<<PHP
<?php

use Illuminate\Support\Facades\Route;
use App\Modules\\{$name}\Http\Controllers\\{$name}Controller;

Route::post('/crear', [{$name}Controller::class, 'crear']);
PHP;
    }
}
