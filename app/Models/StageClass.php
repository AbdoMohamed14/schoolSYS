<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StageClass extends Model
{
    use HasFactory;

    protected $fillable = ['name_en', 'name_ar', 'stage_id'];



    public function stage()
    {
        return $this->belongsTo(Stage::class, 'stage_id', 'id');
    }


    public function subject()
    {
        return $this->hasMany(Subject::class, 'stage_class_id', 'id');
    }
}
