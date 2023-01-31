<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class truefalse extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function quize(){
        return $this->belongsTo(Quizze::class,'quizze_id');
    }
    protected static function booted()
    {
        static::creating(function ($truefalse) {
          $quizze=  $truefalse->quize();
            $quizze->increment('number');
        });
        static::deleting(function ($truefalse) {
            $quizze=  $truefalse->quize();
            $quizze->decrement('number');
        });
    }

}
