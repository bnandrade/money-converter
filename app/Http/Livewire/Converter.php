<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Converter extends Component
{

    public $payment_rate = '1,45%';

    public $destination_currency = '';
    public $value = '';
    public $payment = '';

    public function render()
    {
        return view('livewire.converter');
    }


    public function create()
    {
        $this->validate([
            'destination_currency' => 'required',
            'value' => 'required',
            'payment' => 'required',
        ]);

    }
}
