<?php

namespace INXY\Payments\Signature;

class SignatureDTO
{
    public string $signature;
    public int    $time;

    /**
     * @param string $signature
     * @param int    $time
     */
    public function __construct(string $signature, int $time)
    {
        $this->signature = $signature;
        $this->time      = $time;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'signature' => $this->signature,
            'time'      => $this->time,
        ];
    }
}
