<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Native\Laravel\Events\Menu\MenuItemClicked;

class ClickedCopyV6Link extends MenuItemClicked
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
}
