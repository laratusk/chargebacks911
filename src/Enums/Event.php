<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Enums;

enum Event: string
{
    case ALERT_CREATED = 'ALERT_CREATED';
    case ALERT_STATUS_CHANGED = 'ALERT_STATUS_CHANGED';
    case CASE_CREATED = 'CASE_CREATED';
    case CASE_STATUS_CHANGED = 'CASE_STATUS_CHANGED';
    case CASE_VERDICT_CHANGED = 'CASE_VERDICT_CHANGED';
    case DOC_VALIDATION_ERROR = 'DOC_VALIDATION_ERROR';
    case ERT_CREATED = 'ERT_CREATED';
    case ERT_RESOLVED = 'ERT_RESOLVED';

    /** @return array<string> */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /** @return array<string, string> */
    public static function toArray(): array
    {
        return array_combine(self::values(), self::values());
    }
}
