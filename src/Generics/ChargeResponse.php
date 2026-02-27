<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Generics;

use Laratusk\Chargebacks911\ChargeBackAbstract;

/**
 * @property string $id Chargeback ID
 * @property string $uid Unique ID
 * @property string $order_id Order ID
 * @property int $order_api_generated Order API generated
 * @property string $case_type Case type
 * @property string $mid Merchant ID
 * @property string $mid_alias Merchant alias
 * @property string $descriptor Descriptor
 * @property string $platform_name Platform name
 * @property string $reason_code Reason code
 * @property string $reason_category Reason category
 * @property string $case_no Case number
 * @property string $auth_no Authorization number
 * @property string $arn ARN
 * @property int $platform_id Platform ID
 * @property int $crm_gateway_id CRM Gateway ID
 * @property int|string $reference_number Reference number
 * @property int $bin BIN
 * @property string $card_bin Card BIN
 * @property int $last_four Last four digits of card
 * @property string $card_last_four Last four digits of card
 * @property string $cc_type Credit card type
 * @property string $date_post Post date
 * @property string $date_trans Transaction date
 * @property string $date_due Due date
 * @property numeric $dispute_amount Dispute amount
 * @property string $disputed_amount Disputed amount
 * @property int $partial_chargeback Partial chargeback
 * @property string $chargeback_amount Chargeback amount
 * @property int $chargeback_currency_code Chargeback currency code
 * @property string $fname First name
 * @property string $lname Last name
 * @property string $b_address Billing address
 * @property string $b_city Billing city
 * @property string $b_state Billing state
 * @property string $b_zip Billing zip code
 * @property string $ip_address IP address
 * @property string $currency Currency
 * @property string $status Status
 * @property string $date_updated Last update date
 * @property array<mixed> $status_history Status history
 * @property string $verdict Verdict outcome (e.g. "Win", "Loss") — available based on account access
 * @property array<mixed> $verdict_history Verdict history [{date, verdict}] — available based on account access
 */
final class ChargeResponse extends ChargeBackAbstract
{
    /** @return array<string> */
    protected function requiredFields(): array
    {
        return [];
    }
}
