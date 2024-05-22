<?php

namespace INXY\Payments\Signature;

class PemPrivateKey implements Stringable
{
    private const PemHeader = '-----BEGIN RSA PRIVATE KEY-----';
    private const PemFooter = '-----END RSA PRIVATE KEY-----';

    private string $privateKey;

    /**
     * @param string $privateKey
     */
    public function __construct(string $privateKey)
    {
        $this->privateKey = $privateKey;
    }

    /**
     * @return bool
     */
    private function isPemFormat(): bool
    {
        return str_contains($this->privateKey, self::PemHeader);
    }

    /**
     * @return string
     */
    private function toPemFormat(): string
    {
        $chunkedPrivateKey = chunk_split($this->privateKey, 64, "\n");

        return sprintf("%s\n%s%s", self::PemHeader, $chunkedPrivateKey, self::PemFooter);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->isPemFormat() ? $this->privateKey : $this->toPemFormat();
    }
}
