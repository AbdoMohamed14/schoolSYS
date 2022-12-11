<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classroom::create([
            'name' => 'A1',
            'stage_class_id' => 1,
            'stage_id' => 1
            
        ]);

        Classroom::create([
            'name' => 'B1',
            'stage_class_id' => 2,
            'stage_id'  => 2
            
        ]);


        Classroom::create([
            'name' => 'C1',
            'stage_class_id' => 3,
            'stage_id'  => 3
            
        ]);
    }
}
