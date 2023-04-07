<?php

namespace App\Http\Livewire;

use App\Http\Requests\CreateSheduleRequest;
use App\Models\Event;
use Livewire\Component;
use App\Models\Scheduling;

class ShowSchedules extends Component
{
    public $showModalEvent = false;
    public $showModalEdit = false;
    public $nome = "Lucas";
    public $title = "";
    public $start = "";
    public $end = "";
    public $description = "";
    public $user_id = "";
    public $event_id = "";
    public $events = [];

    protected $rules = [
        'title' => 'required|min:3|max:200',
        //'start' => 'required',
        //'end'   => 'required'
    ];

    public function showModalEvent()
    {
       $this->showModalEvent = true;
    }

    public function showModalEdit()
    {
        $this->showModalEdit = true;
    }

    public function editEvent()
    {
        dd("teste");
    }

    public function createEvent()
    {
        $this->validate();
        if ($this->event_id != "") {
            $event = Event::find($this->event_id);
            $event->title = $this->title;
            $event->start = $this->start;
            $event->end = $this->end;
            $event->description = $this->description;
            $event->user_id = \Auth::id();

            $event->save();
        } else {
            Event::create([
                'title' => $this->title,
                'start'  => $this->start,
                'end' => $this->end,
                'description'  => $this->description,
                'user_id'   => \Auth::id()
            ]);
        }


        session()->flash('message', 'Registro adicionado com sucesso!');

        $this->showModalEvent = false;
        $this->clearInputs();

        $this->dispatchBrowserEvent('refreshEventsCalendar', ['refresh' => true]);
    }

    public function clearInputs()
    {
        $this->nome = "";
        $this->title = "";
        $this->start = "";
        $this->end = "";
        $this->description = "";
        $this->user_id = "";
        $this->id = "";
    }

    public function render()
    {
        $events = Event::get();

        $this->events = json_encode($events);

        return view('livewire.shedules.show-schedules');
    }
}
