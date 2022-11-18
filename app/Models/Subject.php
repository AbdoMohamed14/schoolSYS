<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar', 'name_en', 'image', 'stage_class_id'];




    public function stage_class()
    {
        return $this->belongsTo(stageClass::class, 'stage_class_id', 'id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'subject_id', 'id');
    }
}
