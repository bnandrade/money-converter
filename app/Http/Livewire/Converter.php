<?php

namespace App\Http\Livewire;

use App\Models\Conversion;
use App\Models\Fee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Converter extends Component
{

    public $show_form = true;

    public $default_currency = 'BRL';                   // moeda padrão (origem) - sigla
    public $default_currency_ext = 'Real Brasileiro';   // moeda padrão (origem) - por extenso
    public $destination_currency = '';                  // moeda destino
    public $value = '';                                 // valor para conversão
    public $type_payment = '';                          // tipo de pagamento - boleto/cartão
    public $ask_value = '';                             // valor de venda da moeda estrangeira
    public $conversion_rate = '';                       // taxa de conversão - 1% ou 2%
    public $conversion_rate_value = '';                 // valor da taxa de conversão
    public $payment_rate = '';                          // taxa de forma de pagamento - 1.45% ou 7.63%
    public $payment_rate_value = '';                    // valor da taxa de forma de pagamento
    public $default_value = '';                         // valor utilizado para conversão após as taxas
    public $destination_value = '';                     // valor comprado em moeda destino

    public function render()
    {
        $user_id = Auth::id();
        $my_conversions = Conversion::where('user_id', $user_id)->orderBy('id', 'DESC')->get();

        return view('livewire.converter',[
            'user_id' => $user_id,
            'my_conversions' => $my_conversions
        ]);
    }


    public function create()
    {
        $this->validate(
            [
                'destination_currency' => 'required',
                'value' => 'required',
                'type_payment' => 'required',
            ],
            [
                'destination_currency.required' => 'A moeda destino deve ser selecionada',
                'value.required' => 'O valor para conversão deve ser informado',
                'type_payment.required' => 'A forma de pagamento deve ser informada',
            ]
        );

        $fee = Fee::first();

        $this->show_form = false;
        $response = Http::get("https://economia.awesomeapi.com.br/json/last/$this->destination_currency-$this->default_currency")->json();

        $this->ask_value = (float) $response["$this->destination_currency"."$this->default_currency"]["ask"];
        $this->conversion_rate = $this->value < 3000 ? $fee->conversion_rate_under : $fee->conversion_rate_above;
        $this->payment_rate = $this->type_payment == 'Boleto' ? $fee->payment_rate_ticket : $fee->payment_rate_credit_card;
        $this->conversion_rate_value = $this->value * $this->conversion_rate;
        $this->payment_rate_value = $this->value * $this->payment_rate;
        $this->default_value = $this->value - $this->conversion_rate_value - $this->payment_rate_value;
        $this->destination_value = $this->default_value / $this->ask_value;

        Conversion::create([
            'default_currency' => $this->default_currency,
            'default_currency_ext' => $this->default_currency_ext,
            'destination_currency' => $this->destination_currency,
            'value' => $this->value,
            'type_payment' => $this->type_payment,
            'ask_value' => $this->ask_value,
            'conversion_rate' => $this->conversion_rate,
            'conversion_rate_value' => $this->conversion_rate_value,
            'payment_rate' => $this->payment_rate,
            'payment_rate_value' => $this->payment_rate_value,
            'default_value' => $this->default_value,
            'destination_value' => $this->destination_value,
            'user_id' => Auth::id()
        ]);

    }
}
