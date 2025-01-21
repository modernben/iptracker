<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Native\Laravel\Events\Menu\MenuItemClicked;

class OpenSettings extends MenuItemClicked
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
}
