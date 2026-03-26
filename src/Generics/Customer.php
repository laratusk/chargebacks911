<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Generics;

use Laratusk\Chargebacks911\ChargeBackAbstract;

/**
 * @property string $date_of_first_transaction Date of the customer's first transaction
 * @property string $dob Customer's date of birth
 * @property string $drivers_license_number Customer's driver's license number
 * @property History $history An object containing transaction history
 * @property int|string $id Customer's unique identifier
 * @property int $passport_number Customer's passport number
 * @property array<mixed> $profile_updates An array of profile updates
 * @property string $refund_total Total refund amount for the customer
 * @property SocialMedia $social_media An object containing social media details
 * @property string $ssn Customer's Social Security Number (SSN)
 * @property string $type Customer type (e.g., Individual)
 */
final class Customer extends ChargeBackAbstract
{
    /** @return array<string> */
    protected function requiredFields(): array
    {
        return [];
    }
}
