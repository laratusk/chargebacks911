<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Generics;

use Laratusk\Chargebacks911\ChargeBackAbstract;

/**
 * @property string $code_status Card code status (e.g., Matched)
 * @property string $exp_month Card expiration month
 * @property string $exp_year Card expiration year
 * @property string $number Card number (masked)
 * @property bool $prepaid Whether the card is prepaid
 * @property bool $test Whether the card is a test card
 * @property string $type Card type (e.g., Visa)
 */
final class Card extends ChargeBackAbstract
{
    /** @return array<string> */
    protected function requiredFields(): array
    {
        return [];
    }
}
