<?php

declare(strict_types=1);

use Laratusk\Chargebacks911\Generics\Card;
use Laratusk\Chargebacks911\Generics\Transaction;

it('creates a transaction with required fields', function (): void {
    $transaction = new Transaction([
        'id' => 'txn_001',
        'mid' => 'MID123',
        'settlement_amount' => '99.99',
        'settlement_date' => '2024-01-15',
    ]);

    expect($transaction->id)->toBe('txn_001');
    expect($transaction->mid)->toBe('MID123');
    expect($transaction->settlement_amount)->toBe('99.99');
    expect($transaction->settlement_date)->toBe('2024-01-15');
});

it('throws when required field is missing', function (): void {
    $transaction = new Transaction([
        'id' => 'txn_001',
        'mid' => 'MID123',
        'settlement_amount' => '99.99',
    ]);
    $transaction->toArray();
})->throws(InvalidArgumentException::class, 'settlement_date is required');

it('accepts card object', function (): void {
    $card = new Card(['type' => 'Visa', 'exp_month' => '12', 'exp_year' => '2026']);
    $transaction = new Transaction([
        'id' => 'txn_001',
        'mid' => 'MID123',
        'settlement_amount' => '99.99',
        'settlement_date' => '2024-01-15',
        'card' => $card,
    ]);

    $arr = $transaction->toArray();
    expect($arr['card'])->toHaveKey('type', 'Visa');
});

it('serializes to array', function (): void {
    $transaction = new Transaction([
        'id' => 'txn_001',
        'mid' => 'MID123',
        'settlement_amount' => '99.99',
        'settlement_date' => '2024-01-15',
        'status' => 'Approved',
    ]);

    $arr = $transaction->toArray();
    expect($arr)->toHaveKey('status', 'Approved');
});
