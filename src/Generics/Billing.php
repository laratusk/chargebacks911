<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Generics;

use Laratusk\Chargebacks911\ChargeBackAbstract;

/**
 * @property \Laratusk\Chargebacks911\Generics\Address $address An object containing address details
 * @property string $company Company name
 * @property string $contact_first_name Contact's first name
 * @property string $contact_last_name Contact's last name
 * @property string $email Contact's email address
 * @property string $fax Contact's fax number
 * @property string $phone Contact's phone number
 */
final class Billing extends ChargeBackAbstract
{
    /** @return array<string> */
    protected function requiredFields(): array
    {
        return [];
    }
}
