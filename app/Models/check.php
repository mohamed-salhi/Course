<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class check extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function quize(){
        return $this->belongsTo(Quizze::class,'quizze_id');
    }
    protected static function booted()
    {
        static::creating(function ($check) {
            $quizze=  $check->quize();
            $quizze->increment('number');
        });
        static::deleting(function ($check) {
            $quizze=  $check->quize();
            $quizze->decrement('number');
        });
    }


}
