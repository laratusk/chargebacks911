<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Laratusk\Chargebacks911\Exceptions\AuthenticationException;
use Laratusk\Chargebacks911\Generics\Order;
use Laratusk\Chargebacks911\Generics\Transaction;
use Laratusk\Chargebacks911\Resources\OrderResource;

beforeEach(function (): void {
    Cache::put('chargeback_bearer_token', 'test-token', now()->addMinutes(58));
    Cache::put('chargeback_merchant_payload', ['id' => '12345', 'name' => 'Test'], now()->addMinutes(58));
});

function makeOrder(): Order
{
    $transaction = new Transaction([
        'id' => 'txn_001',
        'mid' => 'MID123',
        'settlement_amount' => '99.99',
        'settlement_date' => '2024-01-15',
    ]);

    return new Order([
        'id' => 'order_001',
        'transactions' => [$transaction->toArray()],
    ]);
}

it('list returns array from api', function (): void {
    Http::fake([
        '*/clients/12345/orders*' => Http::response($this->fixture('orders/list.json'), 200),
    ]);

    $resource = new OrderResource;
    $result = $resource->list();

    expect($result)->toBeArray();
    Http::assertSentCount(1);
});

it('add posts order and returns uid', function (): void {
    Http::fake([
        '*/clients/12345/orders' => Http::response($this->fixture('orders/create.json'), 200),
    ]);

    $uid = (new OrderResource)->add(makeOrder());

    expect($uid)->toBe('1415516');
});

it('updatePut returns true on success', function (): void {
    Http::fake([
        '*/clients/12345/orders' => Http::response($this->fixture('orders/update.json'), 200),
    ]);

    $result = (new OrderResource)->updatePut(makeOrder());

    expect($result)->toBeTrue();
});

it('updatePatch returns uid on success', function (): void {
    Http::fake([
        '*/clients/12345/orders/1415516' => Http::response($this->fixture('orders/update.json'), 200),
    ]);

    $uid = (new OrderResource)->updatePatch(makeOrder(), '1415516');

    expect($uid)->toBe('1415516');
});

it('throws authentication exception on 401', function (): void {
    Http::fake([
        '*/clients/12345/orders' => Http::response(['message' => 'Unauthorized'], 401),
    ]);

    (new OrderResource)->add(makeOrder());
})->throws(AuthenticationException::class);
