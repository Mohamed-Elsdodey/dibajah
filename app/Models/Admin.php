<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];
    public function roles(){
        return $this->belongsToMany(Role::class,'admins_roles','admin_id','role_id');
    }

    public function services(){
        return $this->belongsToMany(Service::class,'admin_services','admin_id','service_id');
    }

}//end
