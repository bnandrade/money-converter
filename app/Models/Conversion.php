<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    use HasFactory;

    protected $fillable = [
        'default_currency',
        'default_currency_ext',
        'destination_currency',
        'value',
        'type_payment',
        'ask_value',
        'conversion_rate',
        'conversion_rate_value',
        'payment_rate',
        'payment_rate_value',
        'default_value',
        'destination_value',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }




}
