<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col bg-white shadow-sm sm:rounded-lg">

            <div>
                <form method="post" wire:submit.prevent="create">

                    <div class="grid grid-cols-3 gap-4 p-6 bg-white border-gray-200">

                        @if($show_form)
                            <div class="col-span-3 text-lg">
                                Moeda de origem: <span class=" font-bold">{{$default_currency_ext}} ({{$default_currency}})</span>
                            </div>

                            <div class="flex justify-center">
                                <div class="mb-3 xl:w-96">
                                    <label for="destination_currency" class="form-label inline-block mb-2 text-gray-700">Selecione a
                                        moeda destino</label>
                                    <select id="destination_currency" wire:model="destination_currency" class="form-select appearance-none
                                                  block
                                                  w-full
                                                  px-3
                                                  py-1.5
                                                  text-base
                                                  font-normal
                                                  text-gray-700
                                                  bg-white bg-clip-padding bg-no-repeat
                                                  border border-solid border-gray-300
                                                  rounded
                                                  transition
                                                  ease-in-out
                                                  m-0
                                                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                        <option value="">Selecione</option>
                                        <option value="USD">Dólar Americano (USD)</option>
                                        <option value="AUD">Dólar Australiano (AUD)</option>
                                        <option value="EUR">Euro (EUR)</option>
                                        <option value="GBP">Libra Esterlina (GBP)</option>
                                    </select>
                                    @error('destination_currency')
                                    <span class="text-red-600 ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-center">
                                <div class="mb-3 xl:w-96">
                                    <label for="value" class="form-label inline-block mb-2 text-gray-700">Informe o valor para conversão</label>
                                    <input
                                        type="number" min="1000.00" max="100000.00" step="0.01"
                                        wire:model="value"
                                        class="
                                            form-control
                                            block
                                            w-full
                                            px-3
                                            py-1.5
                                            text-base
                                            font-normal
                                            text-gray-700
                                            bg-white bg-clip-padding
                                            border border-solid border-gray-300
                                            rounded
                                            transition
                                            ease-in-out
                                            m-0
                                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                      "
                                        id="value"
                                        placeholder="Valor para conversão"
                                    />
                                    @error('value')
                                    <span class="text-red-600 ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-center">
                                    <div class="mb-3 xl:w-96">
                                        <label for="type_payment" class="form-label inline-block mb-2 text-gray-700">Selecione a
                                            forma de pagamento</label>
                                        <select id="type_payment" wire:model="type_payment" class="form-select appearance-none
                                                      block
                                                      w-full
                                                      px-3
                                                      py-1.5
                                                      text-base
                                                      font-normal
                                                      text-gray-700
                                                      bg-white bg-clip-padding bg-no-repeat
                                                      border border-solid border-gray-300
                                                      rounded
                                                      transition
                                                      ease-in-out
                                                      m-0
                                                      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                            <option value="">Selecione</option>
                                            <option value="Boleto">Boleto</option>
                                            <option value="Cartao-credito">Cartão de crédito</option>
                                        </select>
                                        @error('type_payment')
                                        <span class="text-red-600 ml-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            <div class="col-span-3 text-center">
                                <button  type="submit" class="bg-blue-500 px-4 py-2 text-lg rounded-lg border-gray-300 text-white hover:bg-blue-700 ">Converter moeda</button>
                            </div>

                            <div class="col-span-3 text-center" wire:loading.delay.long >
                                <button type="button" class="bg-indigo-500 text-white p-4 rounded" disabled>
                                    Estamos processando sua solicitação...
                                </button>
                            </div>
                        @endif

                        @if($ask_value)
                            <div class="col-span-3" >
                                <div class="grid grid-cols-2 gap-4 my-10 mx-24 bg-gray-200 px-4 py-2 rounded  text-lg">
                                    <div>Moedas de conversão: <span class="font-bold">{{$default_currency}}-{{$destination_currency}}</span></div>
                                    <div>Valor para conversão: <span class="font-bold">R$ {{number_format($value, '2',',','.')}}</span> </div>
                                    <div>Forma de pagamento: <span class="font-bold">{{$type_payment}}</span></div>
                                    <div>Cotação moeda destino: <span class="font-bold">$ {{$ask_value}}</span></div>
                                    <div>Valor comprado moeda destino: <span class="font-bold">$ {{number_format($destination_value, '2',',','.')}}</span></div>
                                    <div>Taxa de pagamento: <span class="font-bold">R$ {{number_format($payment_rate_value, '2',',','.')}}</span></div>
                                    <div>Taxa de conversão: <span class="font-bold">R$ {{number_format($conversion_rate_value, '2',',','.')}}</span></div>
                                    <div>Valor utilizado para conversão: <span class="font-bold">R$ {{number_format($default_value, '2',',','.')}}</span></div>
                                </div>
                            </div>

                            <div class="col-span-3 text-center" >
                                <a href="{{route('dashboard')}}" class="bg-blue-500 px-4 py-2 text-lg rounded-lg border-gray-300 text-white hover:bg-blue-700 ">Nova conversão</a>
                            </div>
                        @endif
                    </div>
                </form>
            </div>

            @if(!$ask_value)
                @if($my_conversions->count() > 0)

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
            @endif
        </div>
    </div>
</div>
