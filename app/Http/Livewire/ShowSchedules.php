<?php

namespace App\Http\Livewire;

use App\Http\Requests\CreateSheduleRequest;
use App\Models\Event;
use Livewire\Component;
use App\Models\Scheduling;

class ShowSchedules extends Component
{
    public $showModalEvent = false;
    public $nome = "Lucas";
    public $title = "";
    public $start = "";
    public $end = "";
    public $description = "";
    public $user_id = "";
    public $events = [];

    protected $rules = [
        'title' => 'required|min:3|max:200',
        //'start' => 'required',
        //'end'   => 'required'
    ];

    public function showModalEvent()
    {
       $this->showModalEvent = true;
       //$this->nome = "Vinicius";
    }

    public function createEvent()
    {
        $this->validate();
        
        Event::create([
            'title' => $this->title,
            'start'  => $this->start,
            'end' => $this->end,
            'description'  => $this->description,
            'user_id'   => \Auth::id()
        ]);

        session()->flash('message', 'Registro adicionado com sucesso!');

        $this->showModalEvent = false;
    }

    public function render()
    {
        //$shedules = Scheduling::get();

        return view('livewire.shedules.show-schedules');
    }
}
