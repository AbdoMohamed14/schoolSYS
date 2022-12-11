<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar', 'name_en', 'avatar', 'email', 'address', 'phone'];



    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teachers_subjects');
    }


    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'teacher_classrooms');
    }
}
