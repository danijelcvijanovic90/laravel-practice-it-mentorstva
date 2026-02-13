<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Forecast;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $faker=Factory::create();

        $cities=Cities::all();

        foreach($cities as $city)
        {
            for($i=0; $i<$amount;$i++)
            Forecast::create([
                "city_id" => $city->id, //for every city->id create $amount of values (temperature and date)
                "temperature" => $faker->numberBetween(0,25), //value between 0-25
                "date" => now()->addDays($i), //start from now and add $i days.

            ]);
        }

        $this->command->getOutput()->info("Seeder done successful!");


    }
}
