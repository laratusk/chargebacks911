<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Resources;

use Illuminate\Support\Facades\Http;
use Laratusk\Chargebacks911\Generics\Order;
use Laratusk\Chargebacks911\Resources\Concerns\Authenticatable;

final class OrderResource
{
    use Authenticatable;

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     */
    public function list(string $path = '', array $params = []): array
    {
        $endpoint = $this->url('clients/'.$this->merchantId().'/orders'.$path);

        $response = Http::withToken($this->bearerToken())->get($endpoint, $params);

        if ($response->successful()) {
            return $response->json();
        }

        throw $this->buildException($response);
    }

    public function add(Order $order): string
    {
        $endpoint = $this->url('clients/'.$this->merchantId().'/orders');

        $response = Http::withToken($this->bearerToken())->post($endpoint, $order->toArray());

        if ($response->successful()) {
            return $response->json('data.uid');
        }

        throw $this->buildException($response);
    }

    public function updatePut(Order $order): bool
    {
        $endpoint = $this->url('clients/'.$this->merchantId().'/orders');

        $response = Http::withToken($this->bearerToken())->put($endpoint, $order->toArray());

        if ($response->successful()) {
            return true;
        }

        throw $this->buildException($response);
    }

    public function updatePatch(Order $order, string $uid): string
    {
        $endpoint = $this->url('clients/'.$this->merchantId().'/orders/'.$uid);

        $response = Http::withToken($this->bearerToken())->patch($endpoint, $order->toArray());

        if ($response->successful()) {
            return $response->json('data.uid');
        }

        throw $this->buildException($response);
    }
}
