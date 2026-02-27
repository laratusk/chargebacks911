<?php

declare(strict_types=1);

use Laratusk\Chargebacks911\Enums\Event;

it('has all expected cases', function (): void {
    expect(Event::cases())->toHaveCount(8);
});

it('values returns all string values', function (): void {
    $values = Event::values();
    expect($values)->toContain('ALERT_CREATED');
    expect($values)->toContain('CASE_CREATED');
    expect($values)->toContain('CASE_VERDICT_CHANGED');
    expect($values)->toContain('ERT_RESOLVED');
});

it('toArray returns key-value pairs', function (): void {
    $arr = Event::toArray();
    expect($arr)->toHaveKey('CASE_CREATED', 'CASE_CREATED');
    expect($arr)->toBeArray();
    expect($arr)->toHaveCount(8);
});

it('can be backed by string', function (): void {
    expect(Event::CASE_CREATED->value)->toBe('CASE_CREATED');
    expect(Event::ALERT_STATUS_CHANGED->value)->toBe('ALERT_STATUS_CHANGED');
});
