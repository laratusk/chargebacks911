<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Laratusk\Chargebacks911\Generics\Alert;
use Laratusk\Chargebacks911\Generics\AlertUpdate;
use Laratusk\Chargebacks911\Resources\AlertResource;

beforeEach(function (): void {
    Cache::put('chargeback_bearer_token', 'test-token', now()->addMinutes(58));
    Cache::put('chargeback_merchant_payload', ['id' => '12345', 'name' => 'Test'], now()->addMinutes(58));
});

it('list returns a collection of Alert', function (): void {
    Http::fake([
        '*/clients/12345/alerts*' => Http::response($this->fixture('alerts/list.json'), 200),
    ]);

    $result = (new AlertResource)->list();

    expect($result)->toHaveCount(1);
    expect($result->first())->toBeInstanceOf(Alert::class);
    expect($result->first()->customerName)->toBe('Roy Smith');
});

it('list accepts filter parameters', function (): void {
    Http::fake([
        '*/clients/12345/alerts*' => Http::response($this->fixture('alerts/list.json'), 200),
    ]);

    $result = (new AlertResource)->list(['completed' => 0, 'per_page' => 20]);

    expect($result)->toHaveCount(1);
    Http::assertSentCount(1);
});

it('update patches an alert', function (): void {
    Http::fake([
        '*/clients/12345/alerts/1*' => Http::response($this->fixture('alerts/update.json'), 200),
    ]);

    $alertUpdate = new AlertUpdate([
        'outcome_id' => 4,
        'customer_name' => 'Benjamin Burnley',
        'order_id' => 'A3D8F224',
        'refund_amount' => 99.99,
        'refund_id' => '3729934',
    ]);

    $result = (new AlertResource)->update('1', $alertUpdate);

    expect($result)->toHaveKey('outcome_id', '4');
    expect($result)->toHaveKey('customer_name', 'Benjamin Burnley');
});

it('throws when outcome_id is missing', function (): void {
    $alertUpdate = new AlertUpdate(['customer_name' => 'Test']);
    $alertUpdate->toArray();
})->throws(\InvalidArgumentException::class, 'outcome_id is required');
