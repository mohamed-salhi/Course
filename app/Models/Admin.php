<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends \Illuminate\Foundation\Auth\User
{
    use HasFactory,Notifiable;
    protected $guarded=[];
}
