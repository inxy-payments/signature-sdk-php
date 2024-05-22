<?php

namespace INXY\Payments\Signature\Exceptions;

use InvalidArgumentException;
use Throwable;

class InvalidPrivateKeyException extends InvalidArgumentException
{
    /**
     * @param string         $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message, int $code = 0, Throwable $previous = null)
    {
        parent::__construct(sprintf("Invalid private key: %s",  $message), $code, $previous);
    }
}
