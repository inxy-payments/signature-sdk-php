<?php

namespace INXY\Payments\Signature;

use INXY\Payments\Signature\Exceptions\SigningFailedException;

class SignatureSDK
{
    private const SignatureSeparator = '_';

    private PrivateKey $privateKey;

    /**
     * @param string $privateKeyString
     */
    public function __construct(string $privateKeyString)
    {
        $this->privateKey = new PrivateKey($privateKeyString);
    }

    /**
     * @param string   $message
     * @param int|null $time
     *
     * @return SignatureDTO
     */
    public function signMessage(string $message, ?int $time = null): SignatureDTO
    {
        $time                 = $time ?? time();
        $messageWithTimestamp = sprintf('%s%s%d', strtolower($message), self::SignatureSeparator, $time);

        $signature = null;
        if (!openssl_sign($messageWithTimestamp, $signature, $this->privateKey->load(), OPENSSL_ALGO_SHA256)) {
            throw new SigningFailedException(openssl_error_string());
        }

        $signatureBase64 = base64_encode($signature);

        return new SignatureDTO($signatureBase64, $time);
    }
}
