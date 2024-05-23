<?php

namespace INXY\Payments\Signature\Tests;

use INXY\Payments\Signature\PemPrivateKey;
use INXY\Payments\Signature\Tests\Fixtures\PrivateKeyFixture;
use PHPUnit\Framework\TestCase;

class PemPrivateKeyTest extends TestCase
{
    /**
     * @return void
     */
    public function testCreateFromString(): void
    {
        $pemPrivateKey = new PemPrivateKey(PrivateKeyFixture::string());

        $this->assertEquals(PrivateKeyFixture::pem(), (string)$pemPrivateKey);
    }

    /**
     * @return void
     */
    public function testCreateFromPem()
    {
        $pemPrivateKey = new PemPrivateKey(PrivateKeyFixture::pem());

        $this->assertEquals(PrivateKeyFixture::pem(), (string)$pemPrivateKey);
    }
}
