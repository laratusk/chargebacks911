<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Generics;

use Laratusk\Chargebacks911\ChargeBackAbstract;

/**
 * @property string $city City name
 * @property string $country Country name
 * @property string $postcode Postal code
 * @property string $state State or region
 * @property string $street Street address
 * @property string $street_2 Additional street address (e.g., suite number)
 */
final class Address extends ChargeBackAbstract
{
    /** @return array<string> */
    protected function requiredFields(): array
    {
        return [];
    }
}
