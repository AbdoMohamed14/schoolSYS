<?php

namespace Database\Seeders;

use App\Models\Myparent;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ar_JO');

        
        for($i = 1; $i <= 10; $i++){

        Myparent::create([
            'name_ar' => $faker->firstNameMale(). ' ' .$faker->firstNameMale(),
            'name_en' => fake()->name(),
            'email'   => fake()->email(),
            'phone'   => fake()->phoneNumber(),
            'password'=> fake()->password(),
            'address' => fake()->address(),

        ]);

        }

    }
}
