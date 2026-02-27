<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Laratusk\Chargebacks911\Enums\Event;
use Laratusk\Chargebacks911\Resources\WebhookResource;

beforeEach(function (): void {
    Cache::put('chargeback_bearer_token', 'test-token', now()->addMinutes(58));
});

it('list returns array of webhooks', function (): void {
    Http::fake([
        '*/webhooks' => Http::response($this->fixture('webhooks/list.json'), 200),
    ]);

    $result = (new WebhookResource)->list();

    expect($result)->toBeArray();
    expect($result[0]['event'])->toBe('CASE_CREATED');
});

it('show returns webhook details', function (): void {
    Http::fake([
        '*/webhooks/webhook_abc123' => Http::response($this->fixture('webhooks/show.json'), 200),
    ]);

    $result = (new WebhookResource)->show('webhook_abc123');

    expect($result)->toHaveKey('id', 'webhook_abc123');
});

it('add creates a webhook', function (): void {
    Http::fake([
        '*/webhooks' => Http::response($this->fixture('webhooks/create.json'), 200),
    ]);

    $result = (new WebhookResource)->add(Event::CASE_CREATED, 'https://example.com/webhook');

    expect($result)->toHaveKey('event', 'CASE_CREATED');
});

it('update modifies a webhook', function (): void {
    Http::fake([
        '*/webhooks/webhook_abc123' => Http::response($this->fixture('webhooks/show.json'), 200),
    ]);

    $result = (new WebhookResource)->update('webhook_abc123', 'https://example.com/new');

    expect($result)->toHaveKey('id', 'webhook_abc123');
});

it('delete removes a webhook', function (): void {
    Http::fake([
        '*/webhooks/webhook_abc123' => Http::response(['success' => true], 200),
    ]);

    $result = (new WebhookResource)->delete('webhook_abc123');

    expect($result)->toHaveKey('success', true);
});

it('test sends test webhook', function (): void {
    Http::fake([
        '*/webhooks/test' => Http::response($this->fixture('webhooks/test.json'), 200),
    ]);

    $result = (new WebhookResource)->test('webhook_abc123');

    expect($result)->toHaveKey('success', true);
});
