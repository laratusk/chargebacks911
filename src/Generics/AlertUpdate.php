<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Generics;

use Laratusk\Chargebacks911\ChargeBackAbstract;

/**
 * @property int $chargeback_case_id The chargeback case identifier
 * @property string $customer_name The full name of the customer associated with the alert
 * @property string $order_id The order identifier
 * @property int $outcome_id The outcome status identifier (required)
 * @property float $refund_amount The refund amount for the alert
 * @property string $refund_id The identifier associated with the refund
 */
final class AlertUpdate extends ChargeBackAbstract
{
    /** @return array<string> */
    protected function requiredFields(): array
    {
        return ['outcome_id'];
    }
}
