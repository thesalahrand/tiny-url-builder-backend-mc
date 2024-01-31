<?php

namespace App\Actions;

use App\Models\TinyUrl;
use Brick\Math\BigInteger;

class GetUniqueTinyUrl
{
    private const SLOT_STARTS_FROM = 100000000000;
    private const ALLOWED_CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    private function convertFromBase10To62(int $base10Number)
    {
        $base62String = '';

        do {
            $index = $base10Number % 62;
            $base62String = self::ALLOWED_CHARS[$index] . $base62String;
            $base10Number = floor($base10Number / 62);
        } while ($base10Number > 0);

        return $base62String;
    }

    public function handle(): string
    {
        $lastInsertedTinyUrlId = TinyUrl::latest()?->first()?->id ?? 0;

        return $this->convertFromBase10To62(self::SLOT_STARTS_FROM + $lastInsertedTinyUrlId);
    }
}
