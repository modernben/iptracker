<?php

namespace App\Listeners;

use App\Events\ClickedCopyV6Link;
use Native\Laravel\Facades\Settings;
use Native\Laravel\Facades\Clipboard;
use Illuminate\Queue\InteractsWithQueue;
use Native\Laravel\Facades\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class CopyIPv6Address
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClickedCopyV6Link $event): void
    {
        $ip = Settings::get('external_ipv6', false);

        if($ip) {
            Clipboard::text($ip);

            Notification::title('Copied to Clipboard')
                ->message($ip)
                ->show();
        }
    }
}
