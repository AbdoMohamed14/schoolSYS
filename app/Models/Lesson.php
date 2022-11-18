<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'subject_id'];



    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }


    public function posts()
    {
        return $this->hasMany(Post::class, 'lesson', 'id');
    }
}
