<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Resources;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Laratusk\Chargebacks911\Generics\AlertOutcome;
use Laratusk\Chargebacks911\Resources\Concerns\Authenticatable;

final class AlertOutcomeResource
{
    use Authenticatable;

    /**
     * Retrieve all possible alert outcomes.
     *
     * @param array{
     *     id?: string,
     *     is_refund?: bool,
     *     is_valid?: bool,
     *     name?: string
     * } $params
     * @return Collection<int, AlertOutcome>
     */
    public function list(array $params = []): Collection
    {
        $response = Http::withToken($this->bearerToken())->get($this->url('alert_outcomes'), $params);

        if ($response->successful()) {
            return $response->collect('data')->map(fn ($item): \Laratusk\Chargebacks911\Generics\AlertOutcome => new AlertOutcome($item));
        }

        throw $this->buildException($response);
    }
}
