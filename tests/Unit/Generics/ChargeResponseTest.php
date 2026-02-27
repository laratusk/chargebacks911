<?php

declare(strict_types=1);

use Laratusk\Chargebacks911\Generics\ChargeResponse;

it('creates from array', function (): void {
    $data = [
        'id' => '93849384',
        'uid' => '09uQAi09u0asjv',
        'status' => 'Completed',
        'mid' => '21226255',
        'case_type' => 'First Chargeback',
        'cc_type' => 'Visa',
    ];

    $response = new ChargeResponse($data);
    expect($response->id)->toBe('93849384');
    expect($response->status)->toBe('Completed');
});

it('handles verdict fields', function (): void {
    $response = new ChargeResponse([
        'id' => '93849384',
        'verdict' => 'Win',
        'verdict_history' => [['date' => '2020-02-01', 'verdict' => 'Win']],
    ]);

    expect($response->verdict)->toBe('Win');
    expect($response->verdict_history)->toBeArray();
    expect($response->verdict_history[0]['verdict'])->toBe('Win');
});

it('handles missing optional fields gracefully', function (): void {
    $response = new ChargeResponse(['id' => '12345']);
    expect($response->verdict)->toBeNull();
    expect($response->verdict_history)->toBeNull();
});

it('serializes to array', function (): void {
    $response = new ChargeResponse([
        'id' => '93849384',
        'status' => 'Completed',
        'disputed_amount' => '49.99',
    ]);

    $arr = $response->toArray();
    expect($arr)->toHaveKey('id', '93849384');
    expect($arr)->toHaveKey('status', 'Completed');
});
