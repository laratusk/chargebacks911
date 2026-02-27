<?php

declare(strict_types=1);

use Laratusk\Chargebacks911\ChargeBackAbstract;

/**
 * @property string $name Name field
 * @property int $count Count field
 * @property ?string $optional Optional field
 * @property array $items Items array
 */
class ConcreteChargeBackStub extends ChargeBackAbstract
{
    protected function requiredFields(): array
    {
        return ['name'];
    }
}

/**
 * @property string $name Name field
 */
class RequiredOnlyStub extends ChargeBackAbstract
{
    protected function requiredFields(): array
    {
        return ['name'];
    }
}

beforeEach(function (): void {
    $this->concrete = new ConcreteChargeBackStub(['name' => 'test', 'count' => 5]);
});

it('sets and gets properties', function (): void {
    expect($this->concrete->name)->toBe('test');
    expect($this->concrete->count)->toBe(5);
});

it('returns null for unset optional property', function (): void {
    expect($this->concrete->optional)->toBeNull();
});

it('throws on unknown property set', function (): void {
    $this->concrete->unknown = 'value';
})->throws(\InvalidArgumentException::class);

it('throws on invalid type', function (): void {
    $this->concrete->count = 'not-an-int';
})->throws(\InvalidArgumentException::class);

it('converts to array', function (): void {
    $arr = $this->concrete->toArray();
    expect($arr)->toHaveKey('name', 'test');
    expect($arr)->toHaveKey('count', 5);
});

it('converts to json', function (): void {
    $json = $this->concrete->toJson();
    $decoded = json_decode((string) $json, true);
    expect($decoded)->toHaveKey('name', 'test');
});

it('throws when required field is missing on toArray', function (): void {
    $obj = new RequiredOnlyStub([]);
    $obj->toArray();
})->throws(\InvalidArgumentException::class);

it('accepts null for nullable property', function (): void {
    $this->concrete->optional = null;
    expect($this->concrete->optional)->toBeNull();
});

it('serializes array property', function (): void {
    $this->concrete->items = ['a', 'b', 'c'];
    $arr = $this->concrete->toArray();
    expect($arr['items'])->toBe(['a', 'b', 'c']);
});

it('handles empty array property', function (): void {
    $this->concrete->items = [];
    $arr = $this->concrete->toArray();
    expect($arr['items'])->toBe([]);
});
