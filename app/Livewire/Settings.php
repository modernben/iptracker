<?php

namespace App\Livewire;

use Livewire\Component;
use Native\Laravel\Facades\Settings as Setting;

class Settings extends Component
{
    public int $polling_interval;

    public function mount()
    {
        $this->polling_interval = Setting::get('polling_interval', 1);
    }

    public function updatedPollingInterval()
    {
        Setting::set('polling_interval', $this->polling_interval);
    }

    public function render()
    {
        return view('livewire.settings');
    }
}
