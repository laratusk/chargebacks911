<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Generics;

use Laratusk\Chargebacks911\ChargeBackAbstract;

/**
 * @property string $alertAge Alert age
 * @property string $amount Transaction amount
 * @property string|bool $analytics Analytics flag
 * @property string $arn Acquirer Reference Number
 * @property string $authCode Authorization code
 * @property string $authDate Authorization date
 * @property string $caseId Case ID
 * @property string $cbCaseId CB Case ID
 * @property string $ccNum Credit card number (masked)
 * @property int $clientId Client ID
 * @property bool $completed Whether the alert has been completed
 * @property string $completedDate Date the alert was completed
 * @property string $confirmedDate Date the alert was confirmed
 * @property int $currencyId Currency ID
 * @property string $currency_name Currency name (e.g., "USD")
 * @property string $customerEmail Customer email address
 * @property string $customerName Customer full name
 * @property string $dateBilled Date the alert was billed
 * @property string $dateCreated Date the alert was created
 * @property string $dateDisputed Date the alert was disputed
 * @property string $dateUpdated Date the alert was last updated
 * @property string $descriptor Merchant descriptor
 * @property string $expirationDate Alert expiration date
 * @property string $firstName Customer first name
 * @property int $id Alert ID
 * @property bool $isDisputed Whether the alert is disputed
 * @property bool $isRefund Whether the alert resulted in a refund
 * @property string $issuerName Issuer name
 * @property bool $isValid Whether the alert is valid
 * @property string $lastName Customer last name
 * @property int $level Alert level
 * @property string $mid Merchant ID
 * @property string $orderId Order ID
 * @property string $outcomeDate Date of the outcome
 * @property int $outcomeId Outcome ID
 * @property string $outcome_name Outcome name (e.g., "Refunded")
 * @property string $processedDate Date the alert was processed
 * @property string $reasonCode Reason code
 * @property string $received Date the alert was received
 * @property string $refundDate Date of the refund
 * @property string $refundId Refund ID
 * @property string $transactionType Transaction type
 * @property string $transDate Transaction date
 * @property string $transId Transaction ID
 * @property string $type Alert type (e.g., "vmpi", "issuer_alert", "dispute")
 */
final class Alert extends ChargeBackAbstract
{
    /** @return array<string> */
    protected function requiredFields(): array
    {
        return [];
    }
}
