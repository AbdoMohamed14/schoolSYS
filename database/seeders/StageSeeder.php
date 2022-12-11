<?php

namespace Database\Seeders;

use App\Models\Stage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Stage::create([
            'name_ar' => 'المرحلة الإبتدائية',
            'name_en' => 'Primary School'
        ]);

        Stage::create([
            'name_ar' => 'المرحلة الإعدادية',
            'name_en' => 'Middle School'
        ]);

        Stage::create([
            'name_ar' => 'المرحلة الثانوية',
            'name_en' => 'Secondary School'
        ]);


    }
}
