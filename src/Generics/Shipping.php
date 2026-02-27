<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Generics;

use Laratusk\Chargebacks911\ChargeBackAbstract;

/**
 * @property \Laratusk\Chargebacks911\Generics\Address $address An object containing shipping address details
 * @property string $carrier_name Carrier name
 * @property string $contact_first_name Contact's first name
 * @property string $contact_last_name Contact's last name
 * @property string $date Shipping date
 * @property string $id Shipping ID
 * @property string $method Shipping method
 * @property string $tracking_number Tracking number
 */
final class Shipping extends ChargeBackAbstract
{
    /** @return array<string> */
    protected function requiredFields(): array
    {
        return [];
    }
}
