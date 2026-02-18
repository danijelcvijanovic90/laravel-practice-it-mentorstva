<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {

        //$amount=$this->command->getOutput()->ask("How many users you want to create?", 50);
        //$password=$this->command->getOutput()->ask("Please enter password for input", 'defaultpassword');
        //$this->command->getOutput()->progressStart($amount);


        //$faker = Factory::create();

        //for($i = 0; $i < $amount; $i++)
        //{
         //ser::create(
             //
               // "name" => $faker->name,
               // "email" => $faker->email,
               // "password" => Hash::make($password),
            //]
        //);

         //this->command->getOutput()->progressAdvance(1);
       //

           //his->command->getOutput()->progressFinish();

        $name=$this->command->getOutput()->ask("Please enter user name:");
        if($name === null)
        {
            $this->command->getOutput()->error("User name can not be empty");
            return;
        }

        $email=$this->command->getOutput()->ask("Please enter user email:");
        if($email === null)
        {
            $this->command->getOutput()->error("Email can not be empty");
            return;
        }


        $password=$this->command->getOutput()->ask("Please enter user password:");
        if($password === null)
        {
            $this->command->getOutput()->error("Password field can not be emppty");
            return;
        }

        if(User::where('email', $email)->exists())
        {
            $this->command->getOutput()->error("User with $email already exists!");
            return; // if user exists, stop with code,
        }

        User::create([
           "name" => $name,
           "email" => $email,
           "password" => Hash::make($password),
        ]);

        $this->command->getOutput()->info("User successfully added!");
    }
}

