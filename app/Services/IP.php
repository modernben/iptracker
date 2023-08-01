<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class IP
{
    public static function getV4(): string|bool
    {
        return Http::get('https://ipv4.seeip.org')->throw(function($error){
            report($error);   
            
            return false;
        })->body();
    }

    public static function getV6(): string|bool
    {
        return Http::get('https://ipv6.seeip.org')->throw(function(){
            report($e);

            return false;
        })->body();
    }
}
