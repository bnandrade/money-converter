<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form method="post" wire:submit.prevent="create">

            <div class="grid grid-cols-3 gap-4 p-6 bg-white border-gray-200 gap-4">

                <div class="col-span-3 text-lg">
                    Moeda de origem: <span class=" font-bold">Real Brasileiro (BRL)</span>
                </div>

                    <div class="flex justify-center">
                        <div class="mb-3 xl:w-96">
                            <label for="moedadestino" class="form-label inline-block mb-2 text-gray-700">Selecione a
                                moeda destino</label>
                            <select id="moedadestino" wire:model="destination_currency" class="form-select appearance-none
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
                                <option value="USD">Dólar Americano (USD)</option>
                                <option value="EUR">Euro (EUR)</option>
                                <option value="GBP">Libra Esterlina (GBP)</option>
                                <option value="BTC">Bitcoin (BTC)</option>
                            </select>
                            @error('destination_currency')
                            <span class="text-red-600 ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <div class="mb-3 xl:w-96">
                            <label for="valorconversao" class="form-label inline-block mb-2 text-gray-700">Informe o valor para conversão</label>
                            <input
                                type="text"
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
                                id="valorconversao"
                                placeholder="Valor para conversão"
                            />
                            @error('value')
                            <span class="text-red-600 ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-center">
                            <div class="mb-3 xl:w-96">
                                <label for="formapagto" class="form-label inline-block mb-2 text-gray-700">Selecione a
                                    forma de pagamento</label>
                                <select id="formapagto" wire:model="payment" class="form-select appearance-none
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
                                    <option value="boleto">Boleto</option>
                                    <option value="cartao-credito">Cartão de crédito</option>
                                </select>
                                @error('payment')
                                <span class="text-red-600 ml-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    <div class="col-span-3 text-center">



                        <button type="submit" class="bg-blue-500 px-4 py-2 text-lg rounded-lg border-gray-300 text-white hover:bg-blue-700 ">Converter moeda</button>
                    </div>
            </div>
            </form>


        </div>
    </div>
</div>
