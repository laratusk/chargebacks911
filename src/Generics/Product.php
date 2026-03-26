<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Generics;

use Laratusk\Chargebacks911\ChargeBackAbstract;

/**
 * @property string $description Product description
 * @property Digital $digital An object containing digital product details
 * @property bool $has_rma Whether the product has an RMA (Return Merchandise Authorization)
 * @property string $id Product ID
 * @property string $is_upsell Whether the product is an upsell
 * @property string $name Product name
 * @property string $price Product price
 * @property string $product_group Product group (e.g., Shoes)
 * @property string $product_type Product type (e.g., Physical)
 * @property string $quantity Product quantity
 * @property bool $recurring_billing Whether recurring billing is enabled
 * @property string $recurring_date Recurring date
 * @property string $rma_id RMA ID
 * @property string $rma_reason RMA reason
 * @property Shipping $shipping An object containing shipping details
 * @property string $sku Product SKU
 * @property string $subscription_desc Subscription description
 * @property string $subscription_id Subscription ID
 * @property string $subscription_service_date Subscription service date
 * @property string $subscription_type Subscription type (e.g., 12month)
 * @property string $upsell_product_name Upsell product name
 * @property string $upsell_product_quantity Upsell product quantity
 * @property string $url Product URL
 */
final class Product extends ChargeBackAbstract
{
    /** @return array<string> */
    protected function requiredFields(): array
    {
        return [];
    }
}
