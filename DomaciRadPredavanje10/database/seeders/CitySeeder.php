<?php

namespace Database\Seeders;

use App\Models\Cities;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Factory::create();

        $amount=$this->command->getOutput()->ask("How many cities you want to create?");

        $this->command->getOutput()->progressStart();

        for($i=0; $i<$amount; $i++)
        {
            Cities::create([
               "name" => $faker->city,
            ]);
        }

        $this->command->getOutput()->progressAdvance();

        $this->command->getOutput()->progressFinish();


    }
}
