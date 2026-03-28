<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\ExchangeRates;

class ExchangeRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:exchange-rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = \Illuminate\Support\Facades\Http::get(
            "https://v6.exchangerate-api.com/v6/" . env("EXCHANGE_RATE_API_KEY") . "/latest/BAM"
        );

        if ($response->successful())
        {
            $data = $response->json();


                foreach(ExchangeRates::AVAILABLE_CURRENCIES as $currency)
                {
                    $todayCurrency=ExchangeRates::getCurrencyForToday($currency);
                    if($todayCurrency != null)
                    {
                        continue;
                    }

                    ExchangeRates::create([
                        'currency' => $currency,
                        'value' => $data['conversion_rates'][$currency],
                    ]);
                }
            }

    }
}
