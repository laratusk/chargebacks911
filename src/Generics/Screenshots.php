<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Generics;

use Laratusk\Chargebacks911\ChargeBackAbstract;

/**
 * @property string $chat_history URL to chat history screenshot
 * @property string $checkout_page URL to checkout page screenshot
 * @property string $copy_of_application URL to copy of application screenshot
 * @property string $copy_of_drivers_license URL to copy of driver's license screenshot
 * @property string $copy_of_email_confirmation URL to copy of email confirmation screenshot
 * @property string $copy_of_passport URL to copy of passport screenshot
 * @property string $copy_of_passport_picture URL to copy of passport picture screenshot
 * @property string $copy_of_resume URL to copy of resume screenshot
 * @property string $order_history URL to order history screenshot
 * @property string $proof_of_delivery URL to proof of delivery screenshot
 * @property string $proof_of_refund URL to proof of refund screenshot
 * @property string $proof_of_usage URL to proof of usage screenshot
 * @property string $profile_picture URL to profile picture screenshot
 * @property string $purchase_history_by_cardholder URL to purchase history by cardholder screenshot
 * @property string $purchase_history_by_customer_profile URL to purchase history by customer profile screenshot
 * @property string $recurring_patron URL to recurring patron screenshot
 * @property string $sales_receipt URL to sales receipt screenshot
 * @property string $terms_and_conditions URL to terms and conditions screenshot
 */
final class Screenshots extends ChargeBackAbstract
{
    /** @return array<string> */
    protected function requiredFields(): array
    {
        return [];
    }
}
