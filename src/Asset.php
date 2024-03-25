<?php

namespace LoginStateless;

use RuntimeException;

/**
 * @see https://github.com/laravel/pulse/blob/1.x/src/Pulse.php
 */
class Asset
{
    /**
     * The CSS paths to include on the dashboard.
     */
    protected $css = [__DIR__.'/../dist/login-stateless.css'];

    /**
     * Register or return CSS for the Login Stateless dashboard.
     */
    public function css(): string
    {
        return collect($this->css)->reduce(function ($carry, $css) {
            if (($contents = @file_get_contents($css)) === false) {
                throw new RuntimeException("Unable to load Login Stateless dashboard CSS path [$css].");
            }

            return "<style>{$contents}</style>".PHP_EOL;
        }, '');
    }
}
