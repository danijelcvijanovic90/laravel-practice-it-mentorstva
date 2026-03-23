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
    protected $signature = 'weather:get-real {city}';

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

       // $response = Http::get("https://api.weatherapi.com/v1/current.json",
            //[
               // 'key' => 'cb99d0241b0e48bfa40115721261203',
              //  'q' => $city,
             //   'aqi' => 'no',
             //   'lang' => 'sr',
         //   ]
     //   );

         $response = Http::get(env("WEATHER_API_URL")."/forecast.json",
            [
                'key' => env("WEATHER_API_KEY"),
                'q' => $this->argument('city'),
                'aqi' => 'no',
                'lang' => 'sr',
                'days' => 5,
           ]
           );

        if($response->successful())
        {
            dd($response->json());
        }
        else
        {
            echo "This city does not exists";
        }



    }
}
