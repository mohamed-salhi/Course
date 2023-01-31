<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function lecture(){
        return $this->hasMany(Lecture::class);
    }
    public function quizze(){
        return $this->hasOne(Quizze::class,'section_id');
    }
}
