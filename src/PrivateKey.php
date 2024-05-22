<?php

namespace INXY\Payments\Signature;

use INXY\Payments\Signature\Exceptions\InvalidPrivateKeyException;
use OpenSSLAsymmetricKey;

class PrivateKey
{
    private PemPrivateKey $privateKey;

    /**
     * @param string $privateKey
     */
    public function __construct(string $privateKey)
    {
        $this->privateKey = new PemPrivateKey($privateKey);
    }

    /**
     * @return OpenSSLAsymmetricKey
     */
    public function load(): OpenSSLAsymmetricKey
    {
        $opensslPrivateKey = openssl_pkey_get_private((string)$this->privateKey);
        if ($opensslPrivateKey === false) {
            throw new InvalidPrivateKeyException(openssl_error_string());
        }

        return $opensslPrivateKey;
    }
}
