<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Clientes') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">    
            @if(session()->has('message'))
                <div class="mb-4 bg-indigo-500 rounded-b text-white px-4 py-4 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <h4>{{ session('message') }}</h4>
                        </div>
                    </div>
                </div>
            @endif

            <div class="mr-2">
                <a href="javascript:;" wire:click="showModal"  class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Novo</a><br/><br/>
            </div>
            
            
            @include('livewire.partials.clients.modal-create')
            @include('livewire.partials.clients.modal-detalhes')

            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
                        <th>Telefone</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($clients as $client)
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">{{ $client->firstname.' '.$client->lastname }}</td>
                            <td class="w-1/3 text-left py-3 px-4">{{ $client->phone }}</td>
                            <td>
                                <button wire:click="showDetalhes({{ $client->id }})" class="bg-indigo-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Detalhes</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>


