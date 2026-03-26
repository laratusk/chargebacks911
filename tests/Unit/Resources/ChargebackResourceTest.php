<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Laratusk\Chargebacks911\Exceptions\NotFoundException;
use Laratusk\Chargebacks911\Generics\ChargeResponse;
use Laratusk\Chargebacks911\Resources\ChargebackResource;

beforeEach(function (): void {
    Cache::put('chargeback_bearer_token', 'test-token', now()->addMinutes(58));
    Cache::put('chargeback_merchant_payload', ['id' => '12345', 'name' => 'Test'], now()->addMinutes(58));
});

it('list returns a collection of ChargeResponse', function (): void {
    Http::fake([
        '*/clients/12345/chargebacks*' => Http::response($this->fixture('chargebacks/list.json'), 200),
    ]);

    $resource = new ChargebackResource;
    $result = $resource->list();

    expect($result)->toHaveCount(1);
    expect($result->first())->toBeInstanceOf(ChargeResponse::class);
    expect($result->first()->status)->toBe('Completed');
});

it('list accepts filter parameters', function (): void {
    Http::fake([
        '*/clients/12345/chargebacks*' => Http::response($this->fixture('chargebacks/list.json'), 200),
    ]);

    $resource = new ChargebackResource;
    $result = $resource->list(['status' => 'Completed', 'per_page' => 25]);

    expect($result)->toHaveCount(1);
    Http::assertSentCount(1);
});

it('maps verdict fields', function (): void {
    Http::fake([
        '*/clients/12345/chargebacks*' => Http::response($this->fixture('chargebacks/list.json'), 200),
    ]);

    $result = (new ChargebackResource)->list();
    $first = $result->first();

    expect($first->verdict)->toBe('Win');
    expect($first->verdict_history)->toBeArray();
});

it('throws on api error', function (): void {
    Http::fake([
        '*/clients/12345/chargebacks*' => Http::response(['message' => 'Not Found'], 404),
    ]);

    (new ChargebackResource)->list();
})->throws(NotFoundException::class);
