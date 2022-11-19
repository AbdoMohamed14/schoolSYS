<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar', 'name_en', 'subject_id', 'avatar', 'email', 'address', 'phone'];



    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }


    public function classrooms()
    {
        return $this->belongsToMany(Teacher_classroom::class, 'teacher_classrooms');
    }
}
