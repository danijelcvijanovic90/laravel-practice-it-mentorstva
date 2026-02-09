<?php

namespace Database\Seeders;

use App\Models\Weather;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city_name=$this->command->getOutput()->ask("Please enter city name:" );
        $temperature=$this->command->getOutput()->ask("Please enter temperature:");

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
