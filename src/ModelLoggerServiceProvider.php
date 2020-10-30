<?php
namespace Vahidid\ModelLogger;

use Illuminate\Support\ServiceProvider;

class ModelLoggerServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->publishes([
            __DIR__.'/migrations' => 'database/migrations/'
        ]);
    }

    public function register(): void
    {

    }
}
