<?php

declare(strict_types=1);

namespace Laratusk\Chargebacks911\Exceptions;

use Throwable;

final class ValidationException extends ChargebackException
{
    /**
     * @param  array<string, mixed>  $errors
     */
    public function __construct(
        string $message = '',
        public readonly array $errors = [],
        ?int $httpStatus = 422,
        ?string $apiMessage = null,
        int $code = 0,
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, $httpStatus, $apiMessage, $code, $previous);
    }
}
