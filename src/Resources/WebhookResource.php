<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Resources;

use Illuminate\Support\Facades\Http;
use Laratusk\Chargebacks911\Enums\Event;
use Laratusk\Chargebacks911\Resources\Concerns\Authenticatable;

final class WebhookResource
{
    use Authenticatable;

    /** @return array<string, mixed> */
    public function list(): array
    {
        $response = Http::withToken($this->bearerToken())->get($this->url('webhooks'));

        if ($response->successful()) {
            return $response->json('data');
        }

        throw $this->buildException($response);
    }

    /** @return array<string, mixed> */
    public function show(string $webhookId): array
    {
        $response = Http::withToken($this->bearerToken())->get($this->url("webhooks/{$webhookId}"));

        if ($response->successful()) {
            return $response->json('data');
        }

        throw $this->buildException($response);
    }

    /** @return array<string, mixed> */
    public function add(Event $event, string $endpoint): array
    {
        $response = Http::withToken($this->bearerToken())->post($this->url('webhooks'), [
            'event' => $event,
            'endpoint' => $endpoint,
        ]);

        if ($response->successful()) {
            return $response->json('data');
        }

        throw $this->buildException($response);
    }

    /** @return array<string, mixed> */
    public function update(string $webhookId, string $endpoint): array
    {
        $response = Http::withToken($this->bearerToken())->put($this->url("webhooks/{$webhookId}"), [
            'endpoint' => $endpoint,
        ]);

        if ($response->successful()) {
            return $response->json('data');
        }

        throw $this->buildException($response);
    }

    /** @return array<string, mixed> */
    public function delete(string $webhookId): array
    {
        $response = Http::withToken($this->bearerToken())->delete($this->url("webhooks/{$webhookId}"));

        if ($response->successful()) {
            return $response->json();
        }

        throw $this->buildException($response);
    }

    /** @return array<string, mixed> */
    public function test(string $webhookId): array
    {
        $response = Http::withToken($this->bearerToken())->post($this->url('webhooks/test'), [
            'webhook_id' => $webhookId,
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        throw $this->buildException($response);
    }
}
