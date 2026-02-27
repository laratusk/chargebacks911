<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Exceptions;

use RuntimeException;
use Throwable;

class ChargebackException extends RuntimeException
{
    public function __construct(
        string $message = '',
        public readonly ?int $httpStatus = null,
        public readonly ?string $apiMessage = null,
        int $code = 0,
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }
}
