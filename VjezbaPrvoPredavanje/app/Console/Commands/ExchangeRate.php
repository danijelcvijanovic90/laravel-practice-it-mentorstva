<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
            "https://v6.exchangerate-api.com/v6/" . env("EXCHANGE_RATE_API_KEY") . "/latest/USD"
        );

        if ($response->successful()) {
            $data = $response->json();

            $eur = $data['conversion_rates']['EUR'];
            $bam = $data['conversion_rates']['BAM'];

            $this->info("EUR: " . $eur);
            $this->info("BAM: " . $bam);
        } else {
            $this->error("API request failed!");
        }
    }
}
