<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Weather;
use Faker\Factory;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities=Cities::all();
        $faker=Factory::create();

        foreach ($cities as $city)
        {
            Weather::create([
               "city_id" => $city->id,
               "temperature" =>  $faker->numberBetween(20,25),
            ]);
        }

        $this->command->getOutput()->info("Seeding done");
    }
}
