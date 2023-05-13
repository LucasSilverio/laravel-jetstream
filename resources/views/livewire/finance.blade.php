<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Financeiro') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th>Data</th>
                    <th>Cliente</th>
                    <th>Valor</th>
                    <th>Forma de Pagamento</th>
                    <th>Prazo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->start }}</td>
                        <td>{{ $event->client !== null ? $event->client->firstname.' '.$event->client->lastname: '-' }}</td>
                        <td>{{ $event->value }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
