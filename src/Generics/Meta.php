<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Generics;

use Laratusk\Chargebacks911\ChargeBackAbstract;

/**
 * @property \Laratusk\Chargebacks911\Generics\Customer $customer Customer identification and history data
 * @property \Laratusk\Chargebacks911\Generics\Screenshots $screenshots Order-related screenshots
 */
final class Meta extends ChargeBackAbstract
{
    /** @return array<string> */
    protected function requiredFields(): array
    {
        return [];
    }
}
