<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class ContactSearchBar extends Component
{
    public $query;
    public $contacts;
    public $client_id;

    public function mount($client_id)
    {
        $this->query = '';
        $this->contacts = [];
        $this->client_id = $client_id;
    }

    public function updatedQuery()
    {
        if (strlen($this->query) > 0) {
            $this->contacts = Client::where('firstname', 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
        } else {
            $this->contacts = [];
        }

    }

    public function selectContact($id)
    {
        $contact = Client::findOrFail($id);

        if ($contact) {
            $this->query = $contact->firstname.' '.$contact->lastname;
            $this->client_id = $contact->id;
            $this->emitUp('clienteSelecionado', $id);
        }

        $this->contacts = [];
    }

    public function render()
    {
        return view('livewire.contact-search-bar');
    }
}
