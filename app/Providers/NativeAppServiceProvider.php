<?php

namespace App\Providers;

use App\Jobs\RefreshIP;
use App\Jobs\UpdateMenuBar;

class NativeAppServiceProvider
{
    public function boot(): void
    {
        UpdateMenuBar::dispatchSync();
        RefreshIP::dispatchSync(onInit: true);
    }
}
