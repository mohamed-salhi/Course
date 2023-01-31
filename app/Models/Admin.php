<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends \Illuminate\Foundation\Auth\User
{
    use HasFactory,Notifiable;
    protected $guarded=[];
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_admins', 'admin_id','role_id');
    }

    public function hasAbility($ability)
    {
        $denied = $this->roles()->whereHas('abilities', function ($query) use ($ability) {
            $query->where('ablity', $ability)
                ->where('type', '=', '1');
        })->exists();

        if ($denied) {
            return true;
        }


    }
}
