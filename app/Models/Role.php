<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded= [];
    protected $table='roles';
    public function permissions(){
        return $this->belongsToMany(Permission::class,'permissions_roles','role_id','permission_id');
    }
}
