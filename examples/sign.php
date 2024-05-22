<?php

use INXY\Payments\Signature\SignatureSDK;

$signatureSDK = new SignatureSDK('your private key here');

$result = $signatureSDK->signMessage('message');

echo $result->signature . "\n";
echo $result->time;
