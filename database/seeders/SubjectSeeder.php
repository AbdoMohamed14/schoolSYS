<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
            'name_ar' => 'اللغة العربية',
            'name_en' => 'Arabic Language', 
        ]);

        Subject::create([
            'name_ar' => 'اللغة الإنجليزية',
            'name_en' => 'Arabic Language', 
        ]);

        Subject::create([
            'name_ar' => ' رياضيات',
            'name_en' => 'Math', 
        ]);

        Subject::create([
            'name_ar' => 'علوم',
            'name_en' => 'Sciences', 
        ]);

        Subject::create([
            'name_ar' => 'تاريخ وجغرافيا',
            'name_en' => 'History and geography', 
        ]);

        Subject::create([
            'name_ar' => 'تربية دينية',
            'name_en' => 'Religious', 
        ]);
    }
}
