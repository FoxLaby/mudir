<?php

namespace FoxLaby\Mudir\App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        if (file_exists(base_path('routes/mudir.php'))) {
            Route::middleware(['web', 'auth', 'FoxLaby\Mudir\App\Http\Middleware\AdminMiddleware'])
                ->namespace($this->namespace)
                ->prefix(config('mudir.prefix'))
                ->group(base_path('routes/mudir.php'));
        }
    }
}
