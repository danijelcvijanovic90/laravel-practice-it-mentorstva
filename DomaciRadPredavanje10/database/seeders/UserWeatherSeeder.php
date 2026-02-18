<?php

namespace Database\Seeders;

use App\Models\Weather;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city_name=$this->command->getOutput()->ask("Please enter city name:" );
        if($city_name === null)
        {
            $this->command->getOutput()->error("City name field can not be empty");
            return;
        }

        $temperature=$this->command->getOutput()->ask("Please enter temperature:");
        if($temperature === null)
        {
            $this->command->getOutput()->error("Temperature field can not be empty");
            return;
        }

        if(Weather::where('city', $city_name)->exitst())
        {
            $this->command->getOutput()->error("Error: City already exists!");
        }

        Weather::create([
           "city" => $city_name,
           "temperature" => $temperature,
        ]);

        $this->command->getOutput()->info("City added successfully");
    }
}
