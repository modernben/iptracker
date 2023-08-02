<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class IP
{
    public static function getV4(): string|bool
    {
        try {
            return Http::get('https://ipv4.seeip.org')->body();
        } catch (Exception $e) {
            report($e);

            return false;
        }
    }

    public static function getV6(): string|bool
    {
        try {
            return Http::get('https://ipv6.seeip.org')->body();
        } catch (Exception $e) {
            report($e);

            return false;
        }
    }

    public static function getIPInfo(): array
    {
        return Http::get('https://freeipapi.com/api/json')->throw(function($error){
            report($error);

            return false;
        })->json();
    }
}
