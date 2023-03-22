<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class ShowClients extends Component
{
    /*protected $client;
    
    public function __construct(Client $client)
    {
        $this->client = $client;
    }*/

    public $showModal = false;
    public $showDetalhes = false;
    public $firstname = "";
    public $lastname = "";
    public $datebirth = "";
    public $document = "";
    public $phone = "";
    public $sex = "";

    public function showModal($hide = false)
    {
        if (!$hide){
            $this->showModal = true;
        }else {
            $this->showModal = false;
        }
        
    }

    public function showDetalhes($id, $hide = false)
    {
        if (!$hide){
            $this->showDetalhes = true;
        }else {
            $this->showDetalhes = false;
        }
        
    }

    public function render()
    {
        //$clients = $this->client->get();
        $clients = Client::get();

        return view('livewire.show-clients', compact('clients'));
    }

    public function create()
    {
        Client::create([
            'firstname' => $this->firstname,
            'lastname'  => $this->lastname,
            'datebirth' => $this->datebirth,
            'document'  => $this->document,
            'phone'     => $this->phone,
            'sex'       => $this->sex  
        ]);

        session()->flash('message', 'Registro adicionado com sucesso!');

        $this->showModal(true);
        $this->clearForm();
    }

    public function clearForm()
    {
        $this->firstname = "";
        $this->lastname = "";
        $this->datebirth = "";
        $this->document = "";
        $this->phone = "";
        $this->sex = "";
    }
}
