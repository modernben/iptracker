<?php

namespace App\Providers;

use App\Services\IP;
use App\Jobs\RefreshIP;
use Illuminate\Support\Str;
use Native\Laravel\Menu\Menu;
use App\Events\ClickedCopyV4Link;
use App\Events\ClickedCopyV6Link;
use Illuminate\Support\Facades\DB;
use Native\Laravel\Facades\MenuBar;

class NativeAppServiceProvider
{
    public function boot(): void
    {
        $externalIpv4 = IP::getV4();
        $externalIpv6 = IP::getV6();

        MenuBar::create()
            ->icon(public_path('menuBarIcon.png'))
            ->withContextMenu(
                Menu::new()
                    ->event(ClickedCopyV4Link::class, 'IPv4: ' . $externalIpv4 ?: 'N/A')
                    ->event(ClickedCopyV6Link::class, 'IPv6: ' . (Str::contains($externalIpv6, '::') ? $externalIpv6 : 'N/A'))
                    ->separator()
                    ->link('https://whatismyipaddress.com', 'What Is My IP?')
                    ->separator()
                    ->quit()
            )
            ->route('openBrowser', [
                'url' => 'https://whatismyipaddress.com/'
            ])
            ->label('Booting...')
            ->onlyShowContextMenu()
        ;

        RefreshIP::dispatchSync(onInit: true);
    }
}
