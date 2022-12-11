<?php

namespace Database\Seeders;

use App\Models\StageClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StageClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        StageClass::create([
            'name_en' => 'Class A Primary School',
            'name_ar' => 'الصف الأول الإبتدائي',
            'stage_id'=> 1
        ]);

        StageClass::create([
            'name_en' => 'Class A Middle School',
            'name_ar' => 'الصف الأول الإعدادي',
            'stage_id'=> 2
        ]);

        StageClass::create([
            'name_en' => 'Class C Secondary School',
            'name_ar' => 'الصف الأول الثانوى',
            'stage_id'=> 3
        ]);

    }
}
