<?php

namespace App\Livewire;

use App\Events\Test;
use Livewire\Component;
use Facades\Native\Laravel\Notification;

class Poll extends Component
{
public function sendIt()
{
Notification::title('Hello from NativePHP')
->message('This is a detail message coming from your Laravel app.')
->event(Test::class)
->show();

}
public function render()
{
return view('livewire.poll');
}
}
