<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Tests;

use Laratusk\Chargebacks911\Providers\ChargeBackServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            ChargeBackServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('chargeback.url', 'https://api.chargebacks911.com/v2');
        $app['config']->set('chargeback.username', 'test-user');
        $app['config']->set('chargeback.password', 'test-pass');
    }

    protected function fixture(string $path): array
    {
        $fullPath = __DIR__.'/Fixtures/'.$path;
        $contents = file_get_contents($fullPath);

        return json_decode($contents, true);
    }
}
