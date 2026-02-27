<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Resources\Concerns;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Laratusk\Chargebacks911\Exceptions\ApiException;
use Laratusk\Chargebacks911\Exceptions\AuthenticationException;
use Laratusk\Chargebacks911\Exceptions\NotFoundException;
use Laratusk\Chargebacks911\Exceptions\RateLimitException;

trait Authenticatable
{
    protected function bearerToken(): string
    {
        if (Cache::has('chargeback_bearer_token')) {
            return Cache::get('chargeback_bearer_token');
        }

        $response = Http::withBasicAuth(
            config('chargeback.username'),
            config('chargeback.password')
        )->get($this->url('auth'), [
            'grant_type' => 'client_credentials',
        ]);

        if ($response->successful()) {
            $token = $response->json('data.accessToken');
            Cache::put('chargeback_bearer_token', $token, now()->addMinutes(58));

            return $token;
        }

        throw $this->buildException($response);
    }

    protected function merchantId(): string
    {
        return $this->merchant('id');
    }

    protected function merchant(?string $key = null): mixed
    {
        if (Cache::has('chargeback_merchant_payload')) {
            $payload = Cache::get('chargeback_merchant_payload');

            return $key ? data_get($payload, $key) : $payload;
        }

        $response = Http::withToken($this->bearerToken())->get($this->url('merchants'));

        if ($response->successful()) {
            $payload = $response->json('data.0');
            Cache::put('chargeback_merchant_payload', $payload, now()->addMinutes(58));

            return $key ? data_get($payload, $key) : $payload;
        }

        throw $this->buildException($response);
    }

    protected function url(string $path): string
    {
        return rtrim((string) config('chargeback.url'), '/').'/'.ltrim($path, '/');
    }

    protected function buildException(Response $response): \Laratusk\Chargebacks911\Exceptions\ChargebackException
    {
        $status = $response->status();
        $message = $response->json('message') ?? 'Unknown error';

        return match (true) {
            $status === 401 => new AuthenticationException($message, $status, $message),
            $status === 404 => new NotFoundException($message, $status, $message),
            $status === 429 => new RateLimitException($message, $status, $message),
            default => new ApiException($message, $status, $message),
        };
    }
}
