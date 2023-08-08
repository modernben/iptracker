<?php

namespace App\Console;

use App\Jobs\RefreshIP;
use Native\Laravel\Facades\Settings;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        // update IP address every minute
        $schedule->call(function(){
            // check if the user has set a custom polling interval
            $pollingInterval = Settings::get('polling_interval', 1);

            if($pollingInterval == 1) {
                RefreshIP::dispatchSync();
                return;
            }

            // check the interval and see if it is due
            // options are every 5 minutes, 10 minutes, 15 minutes, 30 minutes, or 60 minutes
            $now = now();

            if(
                ($pollingInterval == 5 && $now->minute % 5 == 0) ||
                ($pollingInterval == 10 && $now->minute % 10 == 0) ||
                ($pollingInterval == 15 && $now->minute % 15 == 0) ||
                ($pollingInterval == 30 && $now->minute % 30 == 0) ||
                ($pollingInterval == 60 && $now->minute == 0)
            ) {
                RefreshIP::dispatchSync();
                return;
            }
        })->everyMinute();
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
