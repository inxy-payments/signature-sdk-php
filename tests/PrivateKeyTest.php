<?php

namespace INXY\Payments\Signature\Tests;

use INXY\Payments\Signature\Exceptions\InvalidPrivateKeyException;
use INXY\Payments\Signature\PrivateKey;
use INXY\Payments\Signature\Tests\Fixtures\PrivateKeyFixture;
use OpenSSLAsymmetricKey;
use PHPUnit\Framework\TestCase;

class PrivateKeyTest extends TestCase
{
    /**
     * @return void
     */
    public function testLoadValidFromString(): void
    {
        $privateKey = new PrivateKey(PrivateKeyFixture::string());

        $this->assertInstanceOf(OpenSSLAsymmetricKey::class, $privateKey->load());
    }

    /**
     * @return void
     */
    public function testLoadValidFromPEM(): void
    {
        $privateKey = new PrivateKey(PrivateKeyFixture::pem());

        $this->assertInstanceOf(OpenSSLAsymmetricKey::class, $privateKey->load());
    }

    /**
     * @return void
     */
    public function testLoadInvalidFromString(): void
    {
        $privateKey = new PrivateKey("invalid key");

        $this->expectException(InvalidPrivateKeyException::class);

        $privateKey->load();
    }
}
