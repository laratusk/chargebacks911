<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Generics;

use Laratusk\Chargebacks911\ChargeBackAbstract;

/**
 * @property string $id Alert outcome ID
 * @property string $name Plain text name of the outcome (e.g., "Already Refunded", "Refunded")
 * @property string $is_refund Whether the outcome results in a refund
 * @property string $is_valid Whether the outcome is valid
 * @property string $label Label (e.g., "success")
 */
final class AlertOutcome extends ChargeBackAbstract
{
    /** @return array<string> */
    protected function requiredFields(): array
    {
        return [];
    }
}
