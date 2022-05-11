<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConverterMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $message;
    protected $default_currency;
    protected $destination_currency;
    protected $value;
    protected $type_payment;
    protected $ask_value;
    protected $destination_value;
    protected $payment_rate_value;
    protected $conversion_rate_value;
    protected $default_value;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        $name,
        $email,
        $message,
        $default_currency,
        $destination_currency,
        $value,
        $type_payment,
        $ask_value,
        $destination_value,
        $payment_rate_value,
        $conversion_rate_value,
        $default_value
    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->default_currency = $default_currency;
        $this->destination_currency = $destination_currency;
        $this->value = $value;
        $this->type_payment = $type_payment;
        $this->ask_value = $ask_value;
        $this->destination_value = $destination_value;
        $this->payment_rate_value = $payment_rate_value;
        $this->conversion_rate_value = $conversion_rate_value;
        $this->default_value = $default_value;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
            ->subject('Sua conversão de moeda foi realizada')
            ->view('emails.ConverterMail')
            ->with([
                'username' => $this->name,
                'usermessage' => $this->message,
                'default_currency' => $this->default_currency,
                'destination_currency' => $this->destination_currency,
                'value' => $this->value,
                'type_payment' => $this->type_payment,
                'ask_value' => $this->ask_value,
                'destination_value' => $this->destination_value,
                'payment_rate_value' => $this->payment_rate_value,
                'conversion_rate_value' => $this->conversion_rate_value,
                'default_value' => $this->default_value,
            ]);


    }
}
