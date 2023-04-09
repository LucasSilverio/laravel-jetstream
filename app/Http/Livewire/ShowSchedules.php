<?php

namespace App\Http\Livewire;

use App\Http\Requests\CreateSheduleRequest;
use App\Models\Event;
use App\Models\Client;
use Livewire\Component;
use App\Models\Scheduling;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ShowSchedules extends Component
{
    use LivewireAlert;
    public $showModalEvent = false;
    public $showModalEdit = false;
    public $nome = "Lucas";
    public $title = "";
    public $start = "";
    public $end = "";
    public $description = "";
    public $user_id = "";
    public $event_id = "";
    public $confirmDelete = "";
    public $client_id = "";
    public $client_name = "";
    public $events = [];
    public $clients = [];
    public $listeners = ['clienteSelecionado'];

    protected $rules = [
        'title' => 'min:3|max:200|nullable',
        'client_id' => 'required|numeric',
        'start' => 'required|date',
        'end'   => 'required|date',
        'description'   => 'string|nullable'
    ];

    public function showModalEvent()
    {
        $this->getClient();
       $this->showModalEvent = true;
    }

    public function getClient()
    {
        if ($this->client_id != '') {
            $client = Client::FindOrFail($this->client_id);
            $this->client_name = $client->firstname . ' ' . $client->lastname;
        }

    }

    public function clienteSelecionado($id)
    {
        $this->client_id = $id;
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
            if (strlen($this->title) == 0) {
                $client = Client::findOrFail($this->client_id);
            }

            Event::create([
                'title'         => $this->title != '' ? $this->title : $client->firstname . ' ' . $client->lastname,
                'client_id'     => $this->client_id,
                'start'         => $this->start,
                'end'           => $this->end,
                'description'   => $this->description,
                'user_id'       => \Auth::id(),
            ]);
        }

        $this->alert('success', 'Registrado com sucesso!', [
            'timer' => 3000,
            'timerProgressBar' => true
        ]);
        //session()->flash('message', 'Registro adicionado com sucesso!');

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
        $this->event_id = "";
        $this->confirmDelete = "";
    }

    public function confirmDelete()
    {
        $this->confirmDelete = $this->event_id;
    }

    public function delete()
    {
        $event = Event::FindOrFail($this->event_id);

        $event->delete();
        $this->clearInputs();
        $this->showModalEvent = false;

        $this->dispatchBrowserEvent('refreshEventsCalendar', ['refresh' => true]);

        $this->alert('success', 'Agendamento removido com sucesso!', [
            'timer' => 3000,
            'timerProgressBar' => true
        ]);
    }

    public function render()
    {
        $events = Event::get();
        $clients = Client::get();

        $this->events = json_encode($events);
        $this->clients = $clients;

        return view('livewire.shedules.show-schedules');
    }
}
