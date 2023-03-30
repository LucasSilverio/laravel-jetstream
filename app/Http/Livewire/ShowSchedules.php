<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Scheduling;

class ShowSchedules extends Component
{
    public $showModal = false;
    public $nome = "Lucas";

    public function showModal()
    {
        $this->showModal = true;
        //$this->nome = "Vinicius";
    }

    public function render()
    {
        $shedules = Scheduling::get();

        return view('livewire.shedules.show-schedules');
    }
}
