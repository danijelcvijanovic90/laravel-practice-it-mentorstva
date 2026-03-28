<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRates extends Model
{

    const CURRENCY_EUR = 'EUR';
    const CURRENCY_USD = 'USD';

    const AVAILABLE_CURRENCIES = [
        self::CURRENCY_EUR, self::CURRENCY_USD
    ];

    protected $table='exchange_rates';
    protected $fillable=['currency', 'value'];

    public static function getCurrencyForToday($currency)
    {
        return  self::where('currency', $currency)->
            whereDate('created_at', today())->first();
    }

}
