<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Native\Laravel\Facades\Notification;

class IP
{
    public static function getV4(): string
    {
        try {
            return Http::get('https://ipv4.seeip.org')->body();
        } catch (\Exception $e) {
            report($e);

            return 'IPV4 N/A';
        }
    }

    public static function getV6(): string
    {
        try {
            return Http::get('https://ipv6.seeip.org')->body();
        } catch (\Exception $e) {
            report($e);

            return 'IPV6 N/A';
        }
    }
}
