<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'conversion_rate_under',
        'conversion_rate_above',
        'payment_rate_ticket',
        'payment_rate_credit_card'
    ];

}
