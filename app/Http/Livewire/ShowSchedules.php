<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Scheduling;

class ShowSchedules extends Component
{
    public function render()
    {
        $shedules = Scheduling::get();

        return view('livewire.shedules.show-schedules');
    }
}
