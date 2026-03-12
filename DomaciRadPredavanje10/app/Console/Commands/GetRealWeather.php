<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to synchronize real life application using the Open API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get("https://api.weatherapi.com/v1/current.json?key=cb99d0241b0e48bfa40115721261203 &q=London&aqi=no"
        );
        dd($response->json());
    }
}
