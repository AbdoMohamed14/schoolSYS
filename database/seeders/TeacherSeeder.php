<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Factory::create('ar_JO');

        $subjects = Subject::all();

        foreach($subjects as $subject){

            Teacher::create([
                'name_ar' => $faker->name(),
                'name_en' => fake()->name(),
                'address' => fake()->address(),
                'email'   => fake()->email(),
                'phone'   => fake()->phoneNumber()

            ])->subjects()->attach($subject->id);
        }


    }
}
