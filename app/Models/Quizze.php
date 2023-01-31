<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizze extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function section(){
        return $this->belongsTo(Section::class,'section_id');
    }

    public function truefalse(){
        return $this->hasMany(truefalse::class,'quizze_id');
    }

    public function check(){
        return $this->hasMany(check::class,'quizze_id');
    }
}
