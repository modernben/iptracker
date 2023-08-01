<?php

namespace App\Jobs;

use App\Services\IP;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Native\Laravel\Menu\Menu;
use App\Events\ClickedCopyV4Link;
use App\Events\ClickedCopyV6Link;
use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Facades\Settings;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Native\Laravel\Facades\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class RefreshIP
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $onInit = false)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $externalIpv4 = IP::getV4();
        $externalIpv6 = IP::getV6();

        if($externalIpv4 != Settings::get('external_ipv4')){
            Settings::set('external_ipv4', $externalIpv4);

            Notification::title('IPv4 Address Updated')
                ->message($externalIpv4)
                ->show();

            MenuBar::label($externalIpv4);
        }

        if($externalIpv6 != Settings::get('external_ipv6')){
            Settings::set('external_ipv6', $externalIpv6);

            Notification::title('IPv6 Address Updated')
                ->message($externalIpv6)
                ->show();

            MenuBar::label($externalIpv6);
        }

        if($this->onInit) {
            MenuBar::label($externalIpv4);
        }
    }
}
