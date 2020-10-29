<?php
namespace Vahidid\ModelLogger;

use Illuminate\Support\ServiceProvider;

class ModelLoggerServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->publishes([
            __DIR__.'/migrations' => 'database/'
        ]);
    }

    public function register(): void
    {
        $this->app->make('vahidid\mdoel-logger\src\LogController');
    }
}
