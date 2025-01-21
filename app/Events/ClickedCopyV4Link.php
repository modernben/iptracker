<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Native\Laravel\Events\Menu\MenuItemClicked;
use Illuminate\Broadcasting\InteractsWithSockets;

class ClickedCopyV4Link extends MenuItemClicked
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
}
