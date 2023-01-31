<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'instructor_id');
    }
    public function section(){
        return $this->hasMany(Section::class);
    }
    public function student(){
        return $this->hasMany(Student::class,'course_id');
    }
    public function quizze(){
        return $this->hasMany(Quizze::class,'course_id');
    }

}
