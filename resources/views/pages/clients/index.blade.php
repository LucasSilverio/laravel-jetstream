<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="javascript:;"  class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Novo</a><br/><br/>
                
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
                            <th>Telefone</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($clients as $client)
                            <tr>
                                <td class="w-1/3 text-left py-3 px-4">{{ $client->firstname.' '.$client->lastname }}</td>
                                <td class="w-1/3 text-left py-3 px-4">{{ $client->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
