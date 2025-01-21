<?php

namespace App\Jobs;

use App\Services\IP;
use Illuminate\Support\Str;
use App\Events\OpenSettings;
use Illuminate\Bus\Queueable;
use Native\Laravel\Facades\Menu;
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


class UpdateMenuBar
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function handle()
    {
        $externalIpv4 = IP::getV4();
        $externalIpv6 = IP::getV6();
        $ipInfo = IP::getIPInfo();

        MenuBar::create()
            ->icon(public_path('menuBarIconTemplate.png'))
            ->withContextMenu(
                Menu::make(
                    Menu::label('IPv4: ' . $externalIpv4 ?: 'N/A')->event(ClickedCopyV4Link::class),
                    Menu::label('IPv6: ' . $externalIpv6 ?: 'N/A')->event(ClickedCopyV6Link::class),
                    Menu::label('Country: ' . data_get($ipInfo, 'countryName', 'N/A')),
                    Menu::label('City: ' . data_get($ipInfo, 'cityName', 'N/A')),
                    Menu::separator(),
                    Menu::link('https://whatismyipaddress.com', 'What Is My IP?')->openInBrowser(),
                    Menu::separator(),
                    Menu::label('Settings')->event(OpenSettings::class),
                    Menu::link('https://github.com/modernben/iptracker/releases/', 'Version: ' . config('nativephp.version'))->openInBrowser(),
                    Menu::quit(),
                )
            )
            ->label($externalIpv6 ?: $externalIpv4)
            ->onlyShowContextMenu()
        ;
    }
}
