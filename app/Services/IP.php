<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class IP
{
    public static function getV4(): string
    {
        return Http::get('https://ipv4.seeip.org')->body();
    }

    public static function getV6(): string
    {
        return Http::get('https://ipv6.seeip.org')->body();
    }
}
