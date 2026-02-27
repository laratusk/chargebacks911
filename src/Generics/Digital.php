<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Generics;

use Laratusk\Chargebacks911\ChargeBackAbstract;

/**
 * @property string $cancel_date Date the subscription or service was cancelled
 * @property string $cancel_method Method used to cancel (e.g., email, phone)
 * @property string $cancel_quantity Number of cancellations
 * @property string $download_date Date the digital product was downloaded
 * @property string $download_num Number of times the product was downloaded
 * @property string $first_use_date Date the digital product was first used
 * @property string $last_use_date Date the digital product was last used
 * @property string $signature Digital signature reference
 */
final class Digital extends ChargeBackAbstract
{
    /** @return array<string> */
    protected function requiredFields(): array
    {
        return [];
    }
}
