@if($my_conversions)

    <div class="p-4 border-t-2">
        <div class="text-xl font-semibold mb-2 text-center bg-gray-500 text-white rounded py-2">HIstórico de minhas conversões:</div>
        <table class="table-fixed text-left w-full">
            <thead>
            <tr>
                <th class="w-1/6 border border-light-blue-500 px-4 py-2 text-light-blue-600 text-xs">
                    <div class="flex justify-between">Data</div>
                </th>
                <th class="w-1/6 border border-light-blue-500 px-4 py-2 text-light-blue-600 text-xs">
                    <div class="flex justify-between">Moedas</div>
                </th>
                <th class="w-1/6 border border-light-blue-500 px-4 py-2 text-light-blue-600 text-xs">
                    <div class="flex justify-between">Valor para conversão</div>
                </th>
                <th class="w-1/6 border border-light-blue-500 px-4 py-2 text-light-blue-600 text-xs">
                    <div class="flex justify-between">Forma pagamento</div>
                </th>
                <th class="w-1/6 border border-light-blue-500 px-4 py-2 text-light-blue-600 text-xs">
                    <div class="flex justify-between">Cotação moeda destino</div>
                </th>
                <th class="w-1/6 border border-light-blue-500 px-4 py-2 text-light-blue-600 text-xs">
                    <div class="flex justify-between">Valor comprado moeda destino</div>
                </th>
                <th class="w-1/6 border border-light-blue-500 px-4 py-2 text-light-blue-600 text-xs">
                    <div class="flex justify-between">Valor taxas</div>
                </th>
                <th class="w-1/6 border border-light-blue-500 px-4 py-2 text-light-blue-600 text-xs">
                    <div class="flex justify-between">Valor utilizado para conversão</div>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($my_conversions as $conversion)
                @livewire('item-conversion', ['conversion' => $conversion])

            @endforeach
            </tbody>
        </table>
    </div>

@endif
