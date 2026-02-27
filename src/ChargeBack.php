<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911;

use Laratusk\Chargebacks911\Resources\AlertOutcomeResource;
use Laratusk\Chargebacks911\Resources\AlertResource;
use Laratusk\Chargebacks911\Resources\ChargebackResource;
use Laratusk\Chargebacks911\Resources\MerchantResource;
use Laratusk\Chargebacks911\Resources\OrderResource;
use Laratusk\Chargebacks911\Resources\WebhookResource;

final class ChargeBack
{
    public static function orders(): OrderResource
    {
        return new OrderResource;
    }

    public static function chargebacks(): ChargebackResource
    {
        return new ChargebackResource;
    }

    public static function webhooks(): WebhookResource
    {
        return new WebhookResource;
    }

    public static function alerts(): AlertResource
    {
        return new AlertResource;
    }

    public static function alertOutcomes(): AlertOutcomeResource
    {
        return new AlertOutcomeResource;
    }

    public static function merchant(?string $key = null): mixed
    {
        return (new MerchantResource)->get($key);
    }
}
