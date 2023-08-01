<?php

namespace App\Providers;

use App\Events\Test;
use App\Listeners\RedirectNow;
use App\Listeners\CopyIPAddress;
use App\Events\ClickedCopyV4Link;
use App\Events\ClickedCopyV6Link;
use App\Listeners\CopyIPv4Address;
use App\Listeners\CopyIPv6Address;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
    * The event to listener mappings for the application.
    *
    * @var array<class-string, array<int, class-string>>
    */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        Test::class => [
            RedirectNow::class
        ],

        ClickedCopyV4Link::class => [
            CopyIPv4Address::class
        ],

        ClickedCopyV6Link::class => [
            CopyIPv6Address::class
        ],
    ];




    public function boot(): void
    {

    }




    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
