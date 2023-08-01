<?php

namespace App\Console;

use App\Jobs\RefreshIP;
use Native\Laravel\Facades\MenuBar;
use Illuminate\Support\Facades\Http;
use Native\Laravel\Facades\Settings;
use Native\Laravel\Facades\Notification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{



protected function schedule(Schedule $schedule): void
{
    // update IP address every minute
    $schedule->job(RefreshIP::class)->everyMinute();
}




protected function commands(): void
{
$this->load(__DIR__.'/Commands');

require base_path('routes/console.php');
}
}
