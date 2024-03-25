<?php

namespace Tests;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Gate;
use Livewire\LivewireServiceProvider;
use Livewire\Volt\VoltServiceProvider;
use LoginStateless\ServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use WireUi\Heroicons\HeroiconsServiceProvider;
use WireUi\ServiceProvider as WireUiServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    use RefreshDatabase;

    /**
     * Master user email.
     */
    public string $master = 'test@example.com';

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        Gate::define('admin', fn ($user = null) => $user && $user->email === $this->master);
    }

    /**
     * Load package service provider
     */
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
            VoltServiceProvider::class,
            WireUiServiceProvider::class,
            LivewireServiceProvider::class,
            HeroiconsServiceProvider::class,
        ];
    }

    /**
     * Define database migrations.
     */
    protected function defineDatabaseMigrations(): void
    {
        $this->loadLaravelMigrations();
    }

    /**
     * Define environment setup.
     */
    protected function defineEnvironment($app): void
    {
        tap($app['config'], function (Repository $config) {
            $config->set('system.admin', $this->master);
        });
    }
}
