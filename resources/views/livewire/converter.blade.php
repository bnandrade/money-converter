<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col bg-white shadow-sm sm:rounded-lg">
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
                                <button type="submit" class="bg-blue-500 px-4 py-2 text-lg rounded-lg border-gray-300 text-white hover:bg-blue-700 ">Converter moeda</button>
                            </div>

                    @endif
                    @if($ask_value)
                        <div class="col-span-3" >
                            Moeda de origem: {{$default_currency}}<br>
                            Moeda de destino: {{$destination_currency}}<br>
                            Valor para conversão: R$ {{number_format($value, '2',',','.')}} <br>
                            Forma de pagamento: {{$type_payment}} <br>
                            Valor da "Moeda de destino" usado para conversão: {{$ask_value}} <br>
                            Valor comprado em "Moeda de destino": {{number_format($destination_value, '2',',','.')}} <br>
                            Taxa de pagamento: R$ {{number_format($payment_rate_value, '2',',','.')}} <br>
                            Taxa de conversão: R$ {{number_format($conversion_rate_value, '2',',','.')}} <br>
                            Valor utilizado para conversão descontando as taxas: R$ {{number_format($default_value, '2',',','.')}}
                        </div>
                        <div class="col-span-3" >
                            <a href="{{route('dashboard')}}">Nova conversão</a>
                        </div>
                    @endif
                </div>
            </form>

            @isset($my_conversions)
                <table class="table-auto">
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($my_conversions as $conversion)
                            <tr>
                                <td>{{$conversion->user->name}}</td>
                                <td>{{$conversion->value}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endisset
        </div>
    </div>
</div>
