<?php

namespace App\Listeners;

use App\Events\ClickedCopyV4Link;
use Native\Laravel\Facades\Settings;
use Native\Laravel\Facades\Clipboard;
use Illuminate\Queue\InteractsWithQueue;
use Native\Laravel\Facades\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class CopyIPv4Address
{
    /**
     * Handle the event.
     */
    public function handle(ClickedCopyV4Link $event): void
    {
        $ip = Settings::get('external_ipv4', false);

        if($ip) {
            Clipboard::text($ip);

            Notification::title('Copied to Clipboard')
                ->message($ip)
                ->show();
        }
    }
}
