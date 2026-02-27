<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Generics;

use Laratusk\Chargebacks911\ChargeBackAbstract;

/**
 * @property string $acquire_date Date of customer's account creation
 * @property string $affiliate_id Affiliate, store or franchisee ID
 * @property string $affiliate_name Affiliate, store or franchisee name
 * @property \Laratusk\Chargebacks911\Generics\Billing $billing An object containing order billing details
 * @property int $campaign_id ID of the order's campaign
 * @property string $child_order_id The merchant's custom unique child order identifier
 * @property float $coupon_discount Coupon/Discount amount deducted from the order
 * @property string $date Date that the order was processed in the merchant's CRM/OMS
 * @property string $date_of_last_contact The most recent date that the customer was contacted
 * @property string $employee_name Merchant employee's name who created the order
 * @property string $employee_username Merchant employee's username who created the order
 * @property string $hold_date Date when customer's recurring orders stopped or put this order on hold
 * @property string $id ID of the transaction
 * @property bool $is_blacklisted Is the customer blacklisted in the CRM/OMS?
 * @property bool $is_fraud Is this order flagged as fraud in the CRM/OMS?
 * @property \Laratusk\Chargebacks911\Generics\Meta $meta An object containing customer identification, social media, historical purchases, and order-related screenshots
 * @property array<mixed> $order_notes An array of notes related to this order
 * @property string $on_hold_by The username of the merchant's agent who placed the order on hold
 * @property string $order_click_id To track the online traffic source reference identifier
 * @property string $order_contact_email Customer's email address
 * @property string $order_contact_phone Customer's phone number
 * @property string $parent_order_id The merchant's custom unique parent order identifier
 * @property string $publisher_id Publisher or promoter identifier
 * @property string $publisher_name Publisher or promoter name
 * @property float $sales_tax_amount Order sales tax amount
 * @property float $sales_tax_percent Order sales tax percent
 * @property float $shipping_charge Shipping charge amount
 * @property string $status_confirmation Order has received confirmation in the merchant's CRM/OMS and sent to Fulfillment for processing
 * @property string $status_confirmation_date Date when the order was confirmed and sent to Fulfillment
 * @property string $store_location A link to the merchant's website or physical store identifier
 * @property string $sub_affiliate_id Affiliate, store or franchisee subdivision identifier
 * @property string $sub_affiliate_name Affiliate, store or franchisee subdivision name
 * @property float $total_amount Order amount total
 * @property string $total_currency The currency type of the order total
 * @property array<mixed> $transactions Transaction[] An array of transactions objects related to the order
 * @property \Laratusk\Chargebacks911\Generics\TravelAndEntertainment $travel_and_entertainment An object containing travel and entertainment details
 * @property string $voice_signature A link pointing to a file containing a recording of the audio at the time of order (Phone Orders)
 */
final class Order extends ChargeBackAbstract
{
    /** @return array<string> */
    protected function requiredFields(): array
    {
        return ['id', 'transactions'];
    }
}
