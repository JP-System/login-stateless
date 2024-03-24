<?php

namespace LoginStateless;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap the application events.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Get the file path in the src directory.
     */
    private function srcDir(string $path): string
    {
        return __DIR__."/../{$path}";
    }
}
