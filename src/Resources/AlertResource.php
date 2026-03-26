<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Resources;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Laratusk\Chargebacks911\Generics\Alert;
use Laratusk\Chargebacks911\Generics\AlertUpdate;
use Laratusk\Chargebacks911\Resources\Concerns\Authenticatable;

final class AlertResource
{
    use Authenticatable;

    /**
     * Retrieve alerts for the merchant.
     *
     * @param array{
     *     completed?: int,
     *     date_end?: string,
     *     date_field?: string,
     *     date_start?: string,
     *     limit?: int,
     *     per_page?: int,
     *     outcome_id?: int,
     *     page?: int,
     *     type?: string
     * } $params
     * @return Collection<int, Alert>
     */
    public function list(array $params = []): Collection
    {
        $endpoint = $this->url('clients/'.$this->merchantId().'/alerts');

        $response = Http::withToken($this->bearerToken())->get($endpoint, $params);

        if ($response->successful()) {
            return $response->collect('data')->map(fn ($item): Alert => new Alert($item));
        }

        throw $this->buildException($response);
    }

    /**
     * Update an alert. outcome_id is required in the AlertUpdate object.
     *
     * @return array<string, mixed>
     */
    public function update(string $alertId, AlertUpdate $data): array
    {
        $endpoint = $this->url('clients/'.$this->merchantId().'/alerts/'.$alertId);

        $response = Http::withToken($this->bearerToken())->patch($endpoint, $data->toArray());

        if ($response->successful()) {
            return $response->json('data');
        }

        throw $this->buildException($response);
    }
}
