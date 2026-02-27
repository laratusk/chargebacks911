<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Providers;

use Illuminate\Support\ServiceProvider;

final class ChargeBackServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            path: __DIR__.'/../../config/chargeback.php',
            key: 'chargeback',
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/chargeback.php' => config_path('chargeback.php'),
        ], 'chargeback-config');
    }
}
