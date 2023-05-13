<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Event;

class Finance extends Component
{
    public $events = [];

    public function render()
    {
        $this->events = Event::with('client')->get();

        return view('livewire.finance');
    }
}
