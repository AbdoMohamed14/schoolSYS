<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = ['name_en','name_ar', 'notes'];



    public function stageClass()
    {
        return $this->hasMany(StageClass::class, 'stage_id', 'id');
    }
}
