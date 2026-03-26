<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Resources;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Laratusk\Chargebacks911\Generics\ChargeResponse;
use Laratusk\Chargebacks911\Resources\Concerns\Authenticatable;

final class ChargebackResource
{
    use Authenticatable;

    /**
     * Retrieve a paginated list of chargebacks.
     *
     * @param array{
     *     arn?: string,
     *     card_bin?: string,
     *     case_no?: string,
     *     case_type?: string,
     *     cc_type?: string,
     *     currency?: string,
     *     date_field?: string,
     *     date_created?: string,
     *     date_due?: string,
     *     date_post?: string,
     *     date_updated?: string,
     *     date_end?: string,
     *     id?: string,
     *     last_four?: string,
     *     mid?: string,
     *     page?: int,
     *     per_page?: int,
     *     reason_category?: string,
     *     reason_code?: string,
     *     date_start?: string,
     *     status?: string
     * } $params
     * @return Collection<int, ChargeResponse>
     */
    public function list(array $params = []): Collection
    {
        $endpoint = $this->url('clients/'.$this->merchantId().'/chargebacks');

        $response = Http::withToken($this->bearerToken())->get($endpoint, $params);

        if ($response->successful()) {
            return $response->collect('data')->map(fn ($item): ChargeResponse => new ChargeResponse($item));
        }

        throw $this->buildException($response);
    }
}
