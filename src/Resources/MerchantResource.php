<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Resources;

use Laratusk\Chargebacks911\Resources\Concerns\Authenticatable;

final class MerchantResource
{
    use Authenticatable;

    public function get(?string $key = null): mixed
    {
        return $this->merchant($key);
    }
}
