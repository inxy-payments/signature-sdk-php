<?php

namespace INXY\Payments\Signature\Tests;

use INXY\Payments\Signature\SignatureDTO;
use PHPUnit\Framework\TestCase;

class SignatureDTOTest extends TestCase
{
    /**
     * @return void
     */
    public function testToArray(): void
    {
        $signature    = "test";
        $time         = time();
        $signatureDTO = new SignatureDTO($signature, $time);
        $actual       = $signatureDTO->toArray();
        $expected     = [
            'signature' => $signature,
            'time'      => $time,
        ];

        $this->assertArrayHasKey('signature', $actual);
        $this->assertArrayHasKey('time', $actual);
        $this->assertEquals($expected['time'], $actual['time']);
        $this->assertEquals($expected['signature'], $actual['signature']);
    }
}
