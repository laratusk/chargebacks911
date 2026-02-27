<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Laratusk\Chargebacks911\Generics\AlertOutcome;
use Laratusk\Chargebacks911\Resources\AlertOutcomeResource;

beforeEach(function (): void {
    Cache::put('chargeback_bearer_token', 'test-token', now()->addMinutes(58));
});

it('list returns a collection of AlertOutcome', function (): void {
    Http::fake([
        '*/alert_outcomes*' => Http::response($this->fixture('alert_outcomes/list.json'), 200),
    ]);

    $result = (new AlertOutcomeResource)->list();

    expect($result)->toHaveCount(2);
    expect($result->first())->toBeInstanceOf(AlertOutcome::class);
    expect($result->first()->name)->toBe('Already Refunded');
});

it('list accepts filter parameters', function (): void {
    Http::fake([
        '*/alert_outcomes*' => Http::response($this->fixture('alert_outcomes/list.json'), 200),
    ]);

    $result = (new AlertOutcomeResource)->list(['is_refund' => true]);

    expect($result)->toHaveCount(2);
    Http::assertSentCount(1);
});

it('throws on api error', function (): void {
    Http::fake([
        '*/alert_outcomes*' => Http::response(['message' => 'Too Many Requests'], 429),
    ]);

    (new AlertOutcomeResource)->list();
})->throws(\Laratusk\Chargebacks911\Exceptions\RateLimitException::class);
