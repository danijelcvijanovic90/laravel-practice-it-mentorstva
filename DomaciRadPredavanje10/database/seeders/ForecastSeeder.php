<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Forecast;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amount=$this->command->getOutput()->ask("How many forecast temperatures do you want to create?");
        if($amount === null)
        {
            $this->command->getOutput()->error("Amount of forecast temperatures can not be empty!");
            return;
        }

        $cities=Cities::all();

        $temperature=(int) $this->command->getOutput()->ask('Please input temperature for this day'); // ask user for inital temperature

        if($temperature == null || $temperature < -20 || $temperature > 40 )
        {
            $this->command->getOutput()->error("Temperature must be between -10 and 40 degrees");
            return;
        } // check for input errors

        $current_temperature = $temperature; // create $current_temperature to avoid samee inital input for every iteration

        foreach($cities as $city)
        {

            for($i=0; $i<$amount;$i++)
            {
                $min=max($current_temperature - 5,  -20); //to avoid -10000 temperature I need to declare max and min values for temperatures
                $max=min($current_temperature + 5, 40); // take 40 if temperature goes higher than 40, otherwise take $current_temperature +5, same for max.
                $temperature_next_day=(rand($min,$max)); //calculate new temperature from current temperature +-5.

                $types=[]; // create empty array and add weather types, and then empty $types for every itteration
                if($temperature_next_day <= 1)
                {
                    $types[] = 'snowy';
                }
                if ($temperature_next_day <= 15)
                {
                    $types[] = 'cloudy';
                }
                if ($temperature_next_day >= -10)
                {
                    $types[] = 'rainy';
                }
                $types[]='sunny'; //add sunny always

                $weather_type=$types[array_rand($types)]; //take random string from $types. I can not use rand here, because rand works only with numbers


                Forecast::create([
                    "city_id" => $city->id, //for every city->id create $amount of values (temperature and date)
                    "temperature" => $temperature_next_day,
                    "date" => now()->addDays($i), //start from now and add $i days.
                    "weather_type" => $weather_type,
                    "probability" => $weather_type == 'sunny' ?  null : rand(1,100), //if weather type not sunny go with random percentage from 1 to 100
                ]);

                $current_temperature = $temperature_next_day; //take temperature from last input and calculate new input based on current_temperature
            }


        }

        $this->command->getOutput()->info("Seeder done successful!");


    }
}
