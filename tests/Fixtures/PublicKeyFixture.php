<?php

namespace INXY\Payments\Signature\Tests\Fixtures;

class PublicKeyFixture
{
    /**
     * x509 format key
     *
     * @return string
     */
    public static function string(): string
    {
        return <<<EOD
-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAviXbecnlVp3qPbTAREhr
5t8mDTLjJD3cE5SI8LsIjE2wbs23nkCYe47HveFJf+yqD1FqAaDYi+svRsPqVKVD
/3HcAkx+Qn1cPQyVmFrbj0Q5U6vP7EuVi4ICG3BX5+l5DCAp5uIcLP9sr9h+4Kxa
MGaztYzutHjfsZRX99AwLJfw5axVyGIhZb3fZ1YyeI/P2AGQn8iY2XZQGYwc8emy
qh3B0zByKLSMuuRDu20jZYXTrWDf+uZDSjZoqcXKmZfJIWxuufICa1H1xIxCxPjV
91zG6AKPsqA74TbO91nZGE1yhPE/BA8dkgE+1NEQDWYNMs8cFqQLrLouRqY+g+HV
zQIDAQAB
-----END PUBLIC KEY-----
EOD;

    }
}
