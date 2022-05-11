<?php

namespace App\Http\Livewire;

use App\Models\Fee;
use Livewire\Component;

class Fees extends Component
{
    public $conversion_rate_under = '';
    public $conversion_rate_above = '';
    public $payment_rate_ticket = '';
    public $payment_rate_credit_card = '';
    public $fee = '';
    public $updated = false;

    public function render()
    {
        $fees = Fee::first();
        $this->fee = $fees;

        $this->conversion_rate_under = $fees->conversion_rate_under;
        $this->conversion_rate_above = $fees->conversion_rate_above;
        $this->payment_rate_ticket = $fees->payment_rate_ticket;
        $this->payment_rate_credit_card = $fees->payment_rate_credit_card;

        return view('livewire.fees');
    }

    public function update()
    {
        $this->validate(
            [
                'payment_rate_ticket' => 'required',
                'payment_rate_credit_card' => 'required',
                'conversion_rate_under' => 'required',
                'conversion_rate_above' => 'required',
            ],
            [
                'payment_rate_ticket.required' => 'A Taxa de Boleto deve ser informada',
                'payment_rate_credit_card.required' => 'A Taxa de Cartão de Crédito deve ser informada',
                'conversion_rate_under.required' => 'A Taxa de valores inferior a R$ 3.000,00 deve ser informada',
                'conversion_rate_above.required' => 'A Taxa de valores superior a R$ 3.000,00 deve ser informada',
            ]
        );

        $this->fee->payment_rate_ticket = $this->payment_rate_ticket;
        $this->fee->payment_rate_credit_card = $this->payment_rate_credit_card;
        $this->fee->conversion_rate_under = $this->conversion_rate_under;
        $this->fee->conversion_rate_above = $this->conversion_rate_above;

        $this->fee->save();
        $this->updated = true;

    }
}
