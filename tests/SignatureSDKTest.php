<?php

namespace INXY\Payments\Signature\Tests;

use INXY\Payments\Signature\Exceptions\InvalidPrivateKeyException;
use INXY\Payments\Signature\SignatureSDK;
use INXY\Payments\Signature\Tests\Fixtures\PrivateKeyFixture;
use INXY\Payments\Signature\Tests\Fixtures\PublicKeyFixture;
use PHPUnit\Framework\TestCase;

class SignatureSDKTest extends TestCase
{
    /**
     * @return void
     */
    public function testSuccessSign(): void
    {
        $signatureSDK    = new SignatureSDK(PrivateKeyFixture::string());
        $message         = 'Hello test';
        $result          = $signatureSDK->signMessage($message);
        $publicKeyString = PublicKeyFixture::string();
        $publicKey       = openssl_pkey_get_public($publicKeyString);
        $verifyResult    = openssl_verify(strtolower($message) . '_' . $result->time, base64_decode($result->signature), $publicKey, OPENSSL_ALGO_SHA256);

        $this->assertEquals(1, $verifyResult);
    }

    /**
     * @return void
     */
    public function testSuccessSignFailVerify(): void
    {
        $signatureSDK = new SignatureSDK(PrivateKeyFixture::string());
        $message      = 'Hello test';
        $result       = $signatureSDK->signMessage($message);
        $publicKey    = openssl_pkey_get_public(PublicKeyFixture::string());
        $verifyResult = openssl_verify($message . '_' . $result->time, base64_decode($result->signature), $publicKey, OPENSSL_ALGO_SHA256);

        $this->assertEquals(0, $verifyResult);
    }

    /**
     * @return void
     */
    public function testFailSignFail(): void
    {
        $signatureSDK = new SignatureSDK(PrivateKeyFixture::string() . 'a');
        $message      = 'Hello test';

        $this->expectException(InvalidPrivateKeyException::class);

        $signatureSDK->signMessage($message);
    }
}
