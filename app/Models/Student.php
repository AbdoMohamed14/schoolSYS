<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];


    








    public function myParent()
    {
        return $this->belongsTo(Myparent::class,'parent_id', 'id');
    }

    public function stage()

    {
        return $this->belongsTo(Stage::class, 'stage_id', 'id');

    }

    public function stageClass()
    {
        return $this->belongsTo(StageClass::class, 'stage_class_id', 'id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id', 'id');
    }
}
