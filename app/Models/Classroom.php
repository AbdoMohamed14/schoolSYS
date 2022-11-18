<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'stage_id', 'stage_class_id', 'notes'];





    public function stageClass()
    {
        return $this->belongsTo(StageClass::class, 'stage_class_id', 'id');
    }


    public function stage()
    {
        return $this->belongsTo(Stage::class, 'stage_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'classroom_id', 'id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher_classroom::class, 'teacher_classrooms');
    }
}
