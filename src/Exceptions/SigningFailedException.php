<?php

namespace INXY\Payments\Signature\Exceptions;

use RuntimeException;
use Throwable;

class SigningFailedException extends RuntimeException
{
    /**
     * @param string         $message
     * @param int            $code
     * @param Throwable|null $e
     */
    public function __construct(string $message, int $code = 0, ?Throwable $e = null)
    {
        parent::__construct(sprintf('Signing failed: " %s', $message), $code, $e);
    }
}
