<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Myparent;
use App\Models\StageClass;
use App\Models\Student;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ar_JO');

        $parents = Myparent::all();

        foreach($parents as $parent){

            $stageClass = StageClass::inRandomOrder()->take(1)->pluck('id');
            $classroom = Classroom::inRandomOrder()->take(1)->pluck('id');
            Student::create([
                'name_ar'        => $faker->firstName(),
                'name_en'        => fake()->name(),
                'religion'       => 'muslim', 
                'address'        => $parent->address,
                'stage_class_id' => $stageClass[0],
                'classroom_id'   => $classroom[0],
                'parent_id'      => $parent->id,

            ]);
        }
    }
}
