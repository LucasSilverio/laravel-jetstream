<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $client;
    
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        $clients = $this->client->get();
        
        return view('pages.clients.index', compact('clients'));
    }
}
