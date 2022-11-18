<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myparent extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar', 'name_en', 'image', 'address', 'phone' ];


    public function myStudents()
    {
        return $this->hasMany(Student::class, 'parent_id', 'id');
    }
}
