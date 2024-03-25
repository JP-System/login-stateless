<?php

namespace LoginStateless;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Livewire\Livewire;
use Livewire\Volt\Volt;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot(): void
    {
        $this->setupLivewire();

        $this->registerViews();

        $this->registerRoutes();

        Volt::mount([$this->srcDir('resources/views/livewire')]);
    }

    /**
     * Setup Livewire.
     */
    private function setupLivewire(): void
    {
        Livewire::forceAssetInjection();
    }

    /**
     * Register the package views.
     */
    private function registerViews()
    {
        $this->loadViewsFrom($this->srcDir('resources/views'), 'login-stateless');
    }

    /**
     * Register the package routes.
     */
    private function registerRoutes()
    {
        Route::middleware('web')->group(function () {
            $this->loadRoutesFrom($this->srcDir('routes/login-stateless.php'));
        });
    }

    /**
     * Get the file path in the src directory.
     */
    private function srcDir(string $path): string
    {
        return __DIR__."/../{$path}";
    }
}
