<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Generics;

use Laratusk\Chargebacks911\ChargeBackAbstract;

/**
 * @property string $arn Acquirer Reference Number (ARN)
 * @property string $auth_id Authorization ID
 * @property string $auth_type Authorization type (e.g., Card Not Present)
 * @property string $avs Address Verification System (AVS) response code
 * @property string $bill_cycle Billing cycle
 * @property bool $cascading_gateway Whether cascading gateway is used
 * @property \Laratusk\Chargebacks911\Generics\Card $card An object containing card details
 * @property string $checkout_last_four Last four digits of the card used at checkout
 * @property string $checkout_account_ssn_last_four Last four digits of the customer's SSN used at checkout
 * @property string $cvv Card Verification Value (CVV) response code
 * @property string $date_issued Date the transaction was issued
 * @property string $decline_reason Reason for transaction decline
 * @property string $device_id Device ID used for the transaction
 * @property string $device_name Device name used for the transaction
 * @property string $fraud_action Fraud action taken
 * @property string $fraud_filter Fraud filter used
 * @property string $fraud_score Fraud score
 * @property string $id Transaction ID
 * @property string $ip_address IP address used for the transaction
 * @property string $market_type Market type (e.g., eCommerce)
 * @property string $mid The merchant account number or merchant identifier (MID) associated with this transaction
 * @property string $mid_gateway_descriptor Merchant gateway descriptor
 * @property string $mid_gateway_id Merchant gateway ID
 * @property array<mixed> $products An array of product objects
 * @property string $rebill_discount_percent Rebill discount percentage
 * @property string $refund_amount Refund amount
 * @property string $refund_date Refund date
 * @property string $retry_date Retry date
 * @property string $routing_transit_number The bank routing number used in this transaction
 * @property string $settlement_amount The amount paid to the merchant at the time of settlement
 * @property string $settlement_currency Settlement currency
 * @property string $settlement_date The date the transaction was settled
 * @property string $status Transaction status (e.g., Approved)
 * @property string $void_amount Void amount
 * @property string $void_date Void date
 */
final class Transaction extends ChargeBackAbstract
{
    /** @return array<string> */
    protected function requiredFields(): array
    {
        return ['id', 'mid', 'settlement_amount', 'settlement_date'];
    }
}
