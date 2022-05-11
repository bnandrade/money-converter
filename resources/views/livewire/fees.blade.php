<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col bg-white shadow-sm sm:rounded-lg">

            <div>
                @if($updated)
                    <div class="mx-8 my-2 bg-green-500 text-white font-bold p-4 text-center">Taxas atualizadas com sucesso!</div>

                @endif
                <form method="post" wire:submit.prevent="update">

                    <div class="grid grid-cols-2 gap-4 p-6 bg-white border-gray-200">

                            <div class="flex justify-center">
                                <div class="mb-3 xl:w-96">
                                    <label for="payment_rate_ticket" class="form-label inline-block mb-2 text-gray-700">Taxa com pagamento em Boleto (<small>{{$payment_rate_ticket*100}}%</small>)</label>
                                    <input
                                        type="number" min="0.000" max="100" step="0.0001"
                                        wire:model.defer="payment_rate_ticket"

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
                                        id="payment_rate_ticket"
                                        placeholder="Taxa de Boleto"
                                    />
                                    @error('payment_rate_ticket')
                                    <span class="text-red-600 ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-center">
                                <div class="mb-3 xl:w-96">
                                    <label for="payment_rate_credit_card" class="form-label inline-block mb-2 text-gray-700">Taxa com pagamento em Cartão de Crédito (<small>{{$payment_rate_credit_card*100}}%</small>)</label>
                                    <input
                                        type="number" min="0.00" max="100" step="0.0001"
                                        wire:model.defer="payment_rate_credit_card"
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
                                        id="payment_rate_credit_card"
                                        placeholder="Taxa cartão de crédito"
                                    />
                                    @error('payment_rate_credit_card')
                                    <span class="text-red-600 ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-center">
                                <div class="mb-3 xl:w-96">
                                    <label for="conversion_rate_under" class="form-label inline-block mb-2 text-gray-700">Taxa para valores inferior a R$ 3.000,00 (<small>{{$conversion_rate_under*100}}%</small>)</label>
                                    <input
                                        type="number" min="0.00" max="100" step="0.0001"
                                        wire:model.defer="conversion_rate_under"
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
                                        id="conversion_rate_under"
                                        placeholder="Taxa valor inferior R$ 3.000,00"
                                    />
                                    @error('conversion_rate_under')
                                    <span class="text-red-600 ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-center">
                                <div class="mb-3 xl:w-96">
                                    <label for="conversion_rate_above" class="form-label inline-block mb-2 text-gray-700">Taxa para valores superior a R$ 3.000,00 (<small>{{$conversion_rate_above*100}}%</small>)</label>
                                    <input
                                        type="number" min="0.00" max="100" step="0.0001"
                                        wire:model.defer="conversion_rate_above"
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
                                        id="conversion_rate_under"
                                        placeholder="Taxa valor inferior R$ 3.000,00"
                                    />
                                    @error('conversion_rate_above')
                                    <span class="text-red-600 ml-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-2 text-center">
                                <button type="submit" class="bg-blue-500 px-4 py-2 text-lg rounded-lg border-gray-300 text-white hover:bg-blue-700 ">Salvar</button>
                            </div>


                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
