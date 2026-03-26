<?php

declare(strict_types=1);

use Laratusk\Chargebacks911\Generics\Billing;
use Laratusk\Chargebacks911\Generics\Order;
use Laratusk\Chargebacks911\Generics\Transaction;

function makeTransaction(): array
{
    return (new Transaction([
        'id' => 'txn_001',
        'mid' => 'MID123',
        'settlement_amount' => '99.99',
        'settlement_date' => '2024-01-15',
    ]))->toArray();
}

it('creates an order with required fields', function (): void {
    $order = new Order([
        'id' => 'order_001',
        'transactions' => [makeTransaction()],
    ]);

    expect($order->id)->toBe('order_001');
    expect($order->transactions)->toBeArray();
});

it('throws when required transactions is missing', function (): void {
    $order = new Order(['id' => 'order_001']);
    $order->toArray();
})->throws(InvalidArgumentException::class, 'transactions is required');

it('throws when id is missing', function (): void {
    $order = new Order(['transactions' => [makeTransaction()]]);
    $order->toArray();
})->throws(InvalidArgumentException::class, 'id is required');

it('serializes to array correctly', function (): void {
    $order = new Order([
        'id' => 'order_001',
        'transactions' => [makeTransaction()],
        'total_amount' => 99.99,
    ]);

    $arr = $order->toArray();
    expect($arr)->toHaveKey('id', 'order_001');
    expect($arr)->toHaveKey('total_amount', 99.99);
    expect($arr['transactions'])->toBeArray();
});

it('accepts billing object', function (): void {
    $billing = new Billing(['email' => 'test@example.com']);
    $order = new Order([
        'id' => 'order_001',
        'transactions' => [makeTransaction()],
        'billing' => $billing,
    ]);

    $arr = $order->toArray();
    expect($arr['billing'])->toHaveKey('email', 'test@example.com');
});

it('accepts empty transactions array', function (): void {
    $order = new Order([
        'id' => 'order_001',
        'transactions' => [],
    ]);

    $arr = $order->toArray();
    expect($arr['transactions'])->toBe([]);
});
