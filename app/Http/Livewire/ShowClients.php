<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class ShowClients extends Component
{

    public $showModal = false;
    public $showDetalhes = false;
    public $firstname = "";
    public $lastname = "";
    public $datebirth = "";
    public $document = "";
    public $phone = "";
    public $sex = "";
    public $client = "";
    public $id_client = "";

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

            $this->client = Client::findOrFail($id);

            $this->firstname = $this->client->firstname;
            $this->lastname = $this->client->lastname;
            $this->datebirth = $this->client->datebirth;
            $this->phone = $this->client->phone;
            $this->sex = $this->client->sex;
            $this->id_client = $id;
            
            $this->showDetalhes = true;
        }else {
            $this->showDetalhes = false;
        }
        
    }

    public function render()
    {
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

    public function update()
    {
        Client::updateOrCreate(['id' => $this->id_client],
        [
            'firstname' => $this->firstname,
            'lastname'  => $this->lastname,
            'datebirth' => $this->datebirth,
            'phone'     => $this->phone,
            'sex'       => $this->sex
        ]);

        session()->flash('message', 'Registro editado com sucesso!');

        $this->showDetalhes($this->id_client, true);

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
